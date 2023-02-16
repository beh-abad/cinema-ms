<?php

namespace App\Http\Controllers;

require_once 'php/jdf.php';

use Illuminate\Http\Request;
use App\Models\Film;
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Models\Province;
use App\Models\City_;
use App\Models\Place;
use App\Models\FilmToPlace;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use App\Models\Member;
use App\Models\Order;
use Psy\CodeCleaner\ReturnTypePass;

class ProcessActionsInAdminPanel extends Controller
{
    private $provinces;
    private $cities;
    private $data;
    private $places;
    private $news;
    private $orders;
    private $members;
    private $places_and_city;
    function __construct()
    {
        $this->provinces = Province::all();
        $this->cities = City_::all();
        $this->places_and_city = new City_;
        $this->data = Film::all();
        $this->places = Place::all();
        $this->news = News::all();
        $this->members = Member::all();
        $this->orders = Order::all();
    }
    public function FirstConfiguration($name)
    {
        return view($name, [
            'data' => $this->data,
            'places' => $this->places,
            'provinces' => $this->provinces,
            'cities' => $this->cities,
            'news' => $this->news,
            'users' => $this->members,
            'orders' => $this->orders,
        ]);
    }
    public function ValidationSamples()
    {
        return [
            "name.required" => "فیلد نام خالی می باشد.",
            "name.max" => "فیلد نام حداکثر پنجاه کاراکتر می باشد.",
            "name.min" => "فیلد نام حداقل 2 کاراکتر می باشد.",
            "duration.required" => "فیلد مدت زمان خالی می باشد.",
            "duration.numeric" => "فیلد مدت زمان باید یک مقدار عددی باشد.",
            "dir_name.required" => "فیلد نام کارگردان خالی می باشد.",
            "dir_name.max" => "فیلد نام کارگردان حداکثر پنجاه کاراکتر می باشد.",
            "ex_producer.required" => "فیلد نام تهیه کننده خالی می باشد.",
            "ex_producer.max" => "فیلد نام تهیه کننده حداکثر پنجاه کاراکتر می باشد.",
            "place.required" => "فیلد مکان خالی می باشد.",
            "about.required" => "فیلد اطلاعات بیشتر  خالی می باشد.",
            "about.max" => "فیلد اطلاعات بیشتر حداکثر هزار کاراکتر می باشد.",
            "cny.required" => "فیلد کشور سازنده خالی می باشد.",
            "cny.max" => "فیلد کشور سازنده حداکثر سی کاراکتر می باشد.",
            "language.required" => "فیلد زبان خالی می باشد.",
            "language.max" => "فیلد زبان حداکثر پنجاه کاراکتر می باشد.",
            "price.required" => "فیلد قیمت خالی می باشد.",
            "price.numeric" => "فیلد قیمت باید عددی باشد.",
            "price.max" => "فیلد قیمت حداکثر بیست کاراکتر می باشد.",
            "ifr" => "فیلد ifram خالی می باشد.",
            'city.required' => "فیلد شهر خالی می باشد.",
            "address.required" => "فیلد آدرس خالی می باشد.",
            "address.max" => "فیلد آدرس حداکثر سیصد کاراکتر می باشد.",
            "capacity.required" => "فیلد ظرفیت خالی می باشد.",
            "capacity.max" => "فیلد ظرفیت حداکثر ده کاراکتر می باشد.",
            "news.required" => "شما هیچ اطلاعاتی وارد نکردید.",
            "file.required" => "فیلد فایل خالی می باشد.",
            "file.max" => "حجم فایل ورودی بیشتر از چهار مگابایت می باشد.",
            "image_file.required" => "فیلد فایل خالی می باشد.",
            "image_file.max" => "حجم فایل ورودی بیشتر از چهار مگابایت می باشد.",
            "news.required" => "شما هیچ اطلاعاتی وارد نکردید.",
            "news.max" => "تعداد کاراکتر حداکثر باید سیصد تا باشد.",
            'file1.required' => '.فیلد تصویر اول خالی است',
            'file1.max' =>   '.حجم فیلد تصویر اول بیشتر از چهار مگابایت است',
            'file2.required' => '.فیلد تصویر دوم خالی است',
            'file2.max' =>   '.حجم فیلد تصویر دوم بیشتر از چهار مگابایت است',
            'file3.required' => '.فیلد تصویر سوم خالی است',
            'file3.max' =>   '.حجم فیلد تصویر سوم بیشتر از چهار مگابایت است',
            'file4.required' => '.فیلد تصویر چهارم خالی است',
            'file4.max' =>   '.حجم فیلد تصویر چهارم بیشتر از جهار مگابایت است',
            'file5.required' => '.فیلد تصویر پنجم خالی است',
            'file5.max' =>   '.حجم فیلد تصویر پنجم بیشتر از چهار مگابایت است',
        ];
    }
    public function FilmsAdmin()
    {
        return $this->FirstConfiguration('films_admin');
    }
    public function InitCities($id = 0)
    {
        if ($id == 0) {
            $cities = $this->cities;
        } else {
            $cities = $this->places_and_city
                ->where('city_of_id', '=', $id)
                ->get();
        }
        $cities_array['city_data'] = $cities;
        return json_encode($cities_array);
    }
    public function InitPlaces($id)
    {
        $places = Place::join('city_s', 'place_of_id', '=', 'city_id')
            ->where('place_of_id', '=', $id)
            ->get();
        $places_array['place_data'] = $places;
        return json_encode($places_array);
    }
    public function AddAFilmFirstInit()
    {
        return $this->FirstConfiguration('add_a_film');
    }
    public function AddAFilm(Request $input_request)
    {
        $validationVar = Validator::make(
            $input_request->all(),
            [
                'name' => 'required|min:2|max:50',
                'duration' => 'required',
                'dir_name' => 'required|max:50',
                'ex_producer' => 'required|max:50',
                'about' => 'required|max:1000',
                'cny' => 'required|max:50',
                'language' => 'required|max:50',
                'price' => 'required|numeric',
                'ifr' => 'required'
            ],
            $this->ValidationSamples()
        );
        if ($validationVar->fails()) {
            return response()->json(['result' => -1, 'error' => $validationVar->errors()->toArray()]);
        } else {
            try {
                $object = new Film();
                $object_2 = new Place();
                $selectedcheckBox = $input_request["check"];
                $day = $input_request["day"];
                $time = $input_request["time"];
                $salon = $input_request["salon"];
                $place_ids = $input_request["place_id"];
                $file_exists = $input_request['file1'];
                if ($file_exists !== null) {
                    $file = $input_request->file('file1');
                    $fileName = $file->getClientOriginalName();
                    $file->storeAs('public\film_images\\', $fileName);
                    $object->image_name = $fileName;
                }
                $object->film_name = $input_request['name'];
                $object->running_time =  $input_request['duration'];
                $object->director_name = $input_request['dir_name'];
                $object->ex_producer = $input_request['ex_producer'];
                $object->country = $input_request['cny'];
                $object->language = $input_request['language'];
                $object->price_of_film = $input_request['price'];
                $object->film_iframe = $input_request['ifr'];
                $film_of_idsAr = [];
                $salonAr = [];
                $dayAr = [];
                $timeAr = [];
                foreach ($selectedcheckBox as $id => $value) {
                    $film_of_idsAr += [$id => $place_ids[$id]];
                    $salonAr += [$id => $salon[$id]];
                    $dayAr += [$id => $day[$id]];
                    $timeAr += [$id => $time[$id]];
                }
                $object->film_of_ids = json_encode($film_of_idsAr);
                $object->salon = json_encode($salonAr);
                $object->day = json_encode($dayAr);
                $object->time = json_encode($timeAr);
                $object->more_about = $input_request['about'];
                $object->save();
                return redirect('filmsadmin');
            } catch (Exception $e) {
                return redirect('error');
            }
        }
    }
    public function EditAFilm($id)
    {
        session()->put('film_id_58302207410434876', $id);
        $rowHasBeenSelected = Film::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenGotten = $rowHasBeenSelected->get();
            return view('edit_a_film', [
                'row' => $rowHasBeenGotten,
                'places' => $this->places,
                'provinces' => $this->provinces,
            ]);
        }
        return  redirect('error');
    }
    public function UpdateTheFilmInformation(Request $input_request)
    {
        try {
            $file_exists = $input_request['image_file'];
            Film::where('id', '=',  session('film_id_58302207410434876'))
                ->update([
                    'film_name' => $input_request['name'],
                    'running_time' =>  $input_request['duration'],
                    'director_name' => $input_request['dir_name'],
                    'ex_producer' => $input_request['dir_name'],
                    'country' => $input_request['cny'],
                    'language' => $input_request['language'],
                    'price_of_film' => $input_request['price'],
                    'day' => $input_request['day'],
                    'time' => $input_request['time'],
                    'more_about' => $input_request['about'],
                    'image_name' => $input_request['file']->getClientOriginalName(),
                ]);
            if ($file_exists !== null) {
                $object = new Film();
                File::delete('storage\film_images\\' . $file_exists);
                $file = $input_request->file('file');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public\film_images', $fileName);
            }
            return redirect('filmsadmin');
        } catch (Exception $e) {
            return redirect('error');
        }
    }
    public function DeleteAFilm($id)
    {
        $rowHasBeenSelected = Film::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenGotten = $rowHasBeenSelected->get();
            File::delete('storage\film_images\\' . $rowHasBeenGotten[0]->image_name);
            $rowHasBeenSelected->delete();
            return redirect()->back();
        }
        return  redirect('error');
    }
    public function PlacesAdmin()
    {
        return $this->FirstConfiguration('places_admin');
    }
    public function AddAPlaceFirstInit()
    {
        return $this->FirstConfiguration('add_a_place');
    }
    public function AddAPlace(Request $input_request)
    {
        $validationVar = Validator::make(
            $input_request->all(),
            [
                'name' => 'required|max:50',
                'city' => 'required',
                'address' => 'required|max:300',
                'capacity' => 'required|max:10',
            ],
            $this->ValidationSamples()
        );
        if (!$validationVar->passes()) {
            return response()->json(['result' => -1, 'error' => $validationVar->errors()->toArray()]);
            exit;
        }
        try {
            $object = new Place();
            $object2 = new Film();
            $file_exists = $input_request['image_file'];
            if ($file_exists !== null) {
                $file = $input_request->file('image_file');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public\place_images', $fileName);
                $object->place_image_name = $fileName;
            }
            $object->place_name = $input_request['name'];
            $object->address = $input_request['address'];
            $object->google_map_iframe = $input_request['map'];
            $object->capacity = $input_request['capacity'];
            $object->id_of_id_as_city = $input_request['province'];
            $object->place_of_id = $input_request['city'];
            $object->save();
            return redirect('placesadmin');
        } catch (Exception $e) {
            return redirect('error');
        }
    }
    public function EditAPlace($id)
    {
        session()->put('edit_id_583swwq220eww1q434876', $id);
        $rowHasBeenSelected = Place::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenGotten = $rowHasBeenSelected->get();
            return view('edit_a_place', [
                'place' => $rowHasBeenGotten,
                'provinces' => $this->provinces,
                'cities' => $this->cities,
            ]);
        }
        return redirect('error');
    }
    public function UpdateThePlaceInformation(Request $input_request)
    {
        $validationVar = Validator::make(
            $input_request->all(),
            [
                'name' => 'required|max:50',
                'city' => 'required',
                'address' => 'required|max:300',
                'capacity' => 'required|max:10',
            ],
            $this->ValidationSamples()
        );
        if ($validationVar->fails()) {
            return response()->json(['result' => -1, 'error' => $validationVar->errors()->toArray()]);
        } else {
            try {
                $object = new Place();
                $file_exists = $input_request['image_file'];
                $information = Place::where('id', '=',  session('edit_id_583swwq220eww1q434876'));
                if ($file_exists != null) {
                    $file = $input_request->file('image_file');
                    $fileName = $file->getClientOriginalName();
                    $information_gotten = $information->get();
                    File::delete('storage\place_images\\' . $information_gotten[0]->place_image_name);
                    $file->storeAs('public\place_images', $fileName);
                    $information->update(["place_image_name" => $fileName]);
                }
                $information
                    ->update([
                        'place_name' => $input_request['name'],
                        'address' => $input_request['address'],
                        'capacity' => $input_request['capacity'],
                        'google_map_iframe' => $input_request['map'],
                        'id_of_id_as_city' => $input_request["province"],
                        'place_of_id' => $input_request['city'],
                    ]);
                return redirect('placesadmin');
            } catch (Exception $e) {
                return redirect('error');
            }
        }
    }
    public function DeleteAPlace($id)
    {
        $rowHasBeenSelected = Place::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenGotten = $rowHasBeenSelected->get();
            File::delete('storage\place_images\\' . $rowHasBeenGotten[0]->place_image_name);
            $rowHasBeenSelected->delete();
            return redirect()->back();
        }
        return  redirect('error');
    }
    public function NewsAdmin()
    {
        return $this->FirstConfiguration("news_admin");
    }
    public function AddNews(Request $input_request)
    {
        $validationVar = Validator::make(
            $input_request->all(),
            [
                'news' => 'required|max:300',
            ],
            $this->ValidationSamples()
        );
        if ($validationVar->fails()) {
            return response()->json(['result' => -1, 'error' => $validationVar->errors()->toArray()]);
        } else {
            try {
                $object = new News();
                $file_exists = $input_request['file'];
                if ($file_exists !== null) {
                    $file = $input_request->file('file');
                    $fileName = $file->getClientOriginalName();
                    $file->storeAs('public\news_images', $fileName);
                    $object->news_images = $fileName;
                }
                $object->news = strip_tags($input_request['news']);
                $object->date_registered = jdate('y/m/d');
                $object->day_registered = jdate('l');
                $object->time_registered = jdate('g:i:s');
                $object->save();
                return redirect('newsadmin');
            } catch (Exception $e) {
                return redirect('error');
            }
        }
    }
    public function EditNews($id)
    {
        session()->put('edit_id_583da220eww1q434876', $id);
        $rowHasBeenSelected = News::where('news_id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenGotten = $rowHasBeenSelected->get();
            return view('edit_news', [
                'news' => $rowHasBeenGotten,
            ]);
        }
        return redirect('error');
    }
    public function UpdateNewsInformation(Request $input_request)
    {
        $validationVar = Validator::make(
            $input_request->all(),
            [
                'news' => 'required|max:300',
            ],
            $this->ValidationSamples()
        );
        if ($validationVar->fails()) {
            return response()->json(['result' => -1, 'error' => $validationVar->errors()->toArray()]);
        } else {
            try {
                $session_var = session('edit_id_583da220eww1q434876');
                $information = News::where('news_id', '=',  $session_var);
                $file_exists = $input_request['file'];
                $object = new News();
                if ($file_exists !== null) {

                    $file = $input_request->file('file');
                    $fileName = $file->getClientOriginalName();
                    $information_gotten = $information->get();
                    File::delete('storage\news_images\\' . $information_gotten[0]->news_images);
                    $file->storeAs('public\news_images', $fileName);
                    $information
                        ->update([
                            'news_images' => $fileName,
                        ]);
                }
                $information
                    ->update([
                        'news' => strip_tags($input_request['news']),
                        'date_edited' => jdate('y/m/d'),
                        'day_edited' => jdate('l'),
                        'time_edited' => jdate('g:i:s')
                    ]);
                return redirect('newsadmin');
            } catch (Exception $e) {
                return redirect('error');
            }
        }
    }
    public function DeleteNews($id)
    {
        $rowHasBeenSelected = News::where('news_id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenGotten = $rowHasBeenSelected->get();
            File::delete('storage\news_images\\' . $rowHasBeenGotten[0]->news_images);
            $rowHasBeenSelected->delete();
            return redirect('newsadmin');
        }
        return redirect('error');
    }
    public function UsersAdmin()
    {
        return $this->FirstConfiguration('users_admin');
    }
    public function DeleteAUser($id)
    {
        $rowHasBeenSelected = Member::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenSelected->delete();
            return redirect("usersadmin");
        }
        return redirect('error');
    }
    public function OrdersAdmin()
    {
        return $this->FirstConfiguration('orders_admin');
    }
    public function DeleteAnOrder($id)
    {
        $rowHasBeenSelected = Order::where('id', '=', $id);
        if ($rowHasBeenSelected->exists()) {
            $rowHasBeenSelected->delete();
            return redirect("ordersadmin");
        }
        return redirect('error');
    }
    public function BestImages(Request $input_file)
    {
        $this->validate(
            $input_file,
            [
                'file1' => 'required|max:4000',
                'file2' => 'required|max:4000',
                'file3' => 'required|max:4000',
                'file4' => 'required|max:4000',
                'file5' => 'required|max:4000',
            ],
            $this->ValidationSamples()
        );
        try {
            $items = scandir(storage_path('app\public\best_images'));
            foreach ($items as $item) {
                Storage::disk('public')->delete('best_images/' . $item);
            }
            Storage::disk('public')->put('best_images', $input_file['file1']);
            Storage::disk('public')->put('best_images', $input_file['file2']);
            Storage::disk('public')->put('best_images', $input_file['file3']);
            Storage::disk('public')->put('best_images', $input_file['file4']);
            Storage::disk('public')->put('best_images', $input_file['file5']);
            return back()->with('mess', '.اطلاعات ثبت شد');
        } catch (Exception $e) {
            return redirect('error');
        }
    }
}
