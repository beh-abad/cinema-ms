<?php

namespace App\Http\Controllers;

require_once 'php/jdf.php';

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Film;
use App\Models\Place;
use App\Models\Order;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Mail\Email;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ProcessActions extends Controller
{
    private $data;
    private $comment;
    private $comment_reverse;
    private $user_id;
    private $dbObject;
    private $order;
    private $place;
    public function __construct()
    {
        $this->data = Film::all();
        $this->user_id = Member::all();
        $this->order = Order::all();
        $this->place = Place::all();
    }
    public function ValidationSamples()
    {
        return [
            "name.required" => "فیلد نام خالی می باشد.",
            "name.max" => "فیلد نام حداکثر پنجاه کاراکتر می باشد.",
            "name.min" => "فیلد نام حداقل 2 کاراکتر می باشد.",
            'email.required' => 'فیلد آدرس ایمیل خالی است.',
            'email.max' => 'فیلد آدرس ایمیل بشتر از 49 کاراکتر است.',
            'email.required' => '.فیلد آدرس ایمیل خالی است',
            'pwd.required' => 'فیلد پسورد خالی است.',
            'pwd.min' => 'فیلد پسورد کمتر از 5 کاراکتر می باشد.',
            'pwd.max' => 'فیلد پسورد بیشتر از 49 کاراکتر می باشد.',
            'cd.required' => 'فیلد کد خالی است.',
            'cd.min' => 'فیلد کد کمتر از 5 کاراکتر است.',
            'cd.max' => 'فیلد کد بیشتر از 5 کاراکتر است.',
            'pwda.required' => 'فیلد تکرار پسورد خالی است.',
            'pwda.min' => 'فیلد تکرار پسورد کمتر از 5 کااراکتر می باشد.',
            'pwda.max' => 'فیلد تکرار پسورد بیشتر از 49 کاراکتر می باشد.',
        ];
    }
    public function ShowList()
    {
        $tableData =  $this->data;
        $rows = 0;
        $box_numbers = 0;
        $count = $tableData->count();
        $total_data = $count;
        if ($count <= 4) {
            $box_numbers = $count;
        } else {
            $rows = (int)($count / 4);
            $count = $count % 4;
            $box_numbers = $count;
        }
        $b_i = scandir('storage\best_images');
        return view('films_user', [
            'data' => $tableData,
            'data_index' => $total_data,
            'b_i' =>  $b_i,
            'rows' => $rows,
            'box_numbers' => $box_numbers,
        ]);
    }
    public function BuyBill($film_id)
    {
        session()->put('film_id', $film_id);
        $data = Film::where("id", "=", $film_id)->get();
        $comment = Comment::where('film_id', '=', $film_id)->get();
        $comment_reverse = $comment->reverse();
        $informationId = json_decode($data[0]->film_of_ids);
        foreach ($informationId as $id => $value) {
            $placeAr[] = (int)$value;
        }
        $result = Place::select('*')->whereIn('id', $placeAr)->get();
        return view("buy_bill", [
            'data' => $data,
            'comments' => $comment,
            'comments_r' => $comment_reverse,
            'places' => $result,
        ]);
    }
    public function OrdersUser($id)
    {
        $tableData = Film::where('id', '=', $id)->get();
        $b_i = scandir('storage\best_images');
        return view('buy_bill', [
            'data' => $tableData,
            'b_i' => $b_i,
            'date_registered' => jdate('y/m/d'),
            'day_registered' => jdate('l'),
            'time_registered' => jdate('g:i:s'),
        ]);
    }
    public function ShowNews()
    {
        $tableData = News::all();
        $rows = 0;
        $box_numbers = 0;
        $count = $tableData->count();
        $total_data = $count;
        if ($count <= 3) {
            $box_numbers = $count;
        } else {
            $rows = (int)($count / 3);
            $count = $count % 3;
            $box_numbers = $count;
        }
        return view('news_user', [
            'data' => $tableData,
            'data_index' => $total_data,
            'rows' => $rows,
            'box_numbers' => $box_numbers,
        ]);
    }
    public function AddAComment(Request $input_request)
    {
        $object = new Comment();
        $film_id = session('film_id');
        $object->user_name = trim($input_request['name']);
        $object->body = trim($input_request['comment']);
        $object->film_id = $film_id;
        $object->save();
        $info['data'] = $object->where('film_id', '=', $film_id)->get();
        return json_encode($info);
    }
    public function RegisterAUser(Request $input_request)
    {
        $validationVar = Validator::make(
            $input_request->all(),
            [
                'name' => 'required|max:19|min:2',
                'email' => 'required|max:49|unique:members',
                'pwd' => 'required|min:5|max:49',
                'pwda' => 'required|min:5|max:49',
            ],
            $this->ValidationSamples()
        );
        if ($validationVar->fails()) {
            return response()->json(['result' => -1, 'error' => $validationVar->errors()->toArray()]);
        } else {
            try {
                if ($input_request['pwd'] == $input_request['pwda']) {
                    $ormObject = new Member();
                    $ormObject->name = $input_request['name'];
                    $ormObject->email = $input_request['email'];
                    $ormObject->password = $input_request['pwd'];
                    $ormObject->date_registered = jdate('y/m/d');
                    $ormObject->day_registered = jdate('l');
                    $ormObject->time_registered = jdate('g:i:s');
                    $ormObject->save();
                    return redirect('/');
                } else {
                    return redirect('error');
                }
            } catch (Exception $e) {
                return redirect('error');
            }
        }
    }
    public function ForgettingPassword(Request $input_request)
    {
        $validationVar = Validator::make(
            $input_request->all(),
            [
                'email' => 'required|max:49',
            ],
            $this->ValidationSamples()
        );
        if ($validationVar->fails()) {
            return response()->json(['result' => -1, 'error' => $validationVar->errors()->toArray()]);
        } else {
            try {
                $rowInfo = Member::where('email', '=', $input_request['email']);
                if ($rowInfo->exists()) {
                    $random_code = random_int(10000, 99999);
                    session()->put('user_forgetting_id', $random_code);
                    session()->put('user_forgetting_email', $input_request['email']);
                    session()->put('frgt', 'r');
                    Mail::to($input_request['email'])->send(new Email($random_code, null, 2));
                    return redirect('resettingpassword');
                } else {
                    return redirect('error');
                }
            } catch (Exception $e) {
                return redirect('error');
            }
        }
    }
    public function ResettingPassword(Request $input_request)
    {
        $validationVar = Validator::make(
            $input_request->all(),
            [
                'cd' => 'required|max:5|min:5',
                'npwd' => 'required|min:5|max:49',
                'pwda' => 'required|min:5|max:49',
            ],
            $this->ValidationSamples()
        );
        if (!$validationVar->passes()) {
            return response()->json(['result' => -1, 'error' => $validationVar->errors()]);
        } else {
            try {
                if ((session('user_forgetting_id') == $input_request['cd']) && ($input_request['pwda'] == $input_request['npwd'])) {
                    Member::where('email', '=', session('user_forgetting_email'))
                        ->update(['password' => $input_request['npwd']]);
                    session()->forget('user_forgetting_id');
                    session()->forget('user_forgetting_email');
                    session()->forget('frgt');
                    session()->forget('user_id');
                    return redirect('userlogin');
                } else {
                    return redirect('error');
                }
            } catch (Exception $e) {
                return redirect('error');
            }
        }
    }
    public function Login(Request $input_request)
    {
        $validationVar = Validator::make(
            $input_request->all(),
            [
                'email' => 'required|max:49',
                'pwd' => 'required|min:5|max:49',
            ],
            $this->ValidationSamples()
        );
        if ($validationVar->fails()) {
            return response()->json(['result' => -1, 'error' => $validationVar->errors()->toArray()]);
        } else {
            try {
                $row = Member::where('email', '=', $input_request['email']);
                $rowInfo = $row->get();
                if ($row->exists() && ($rowInfo[0]->password == $input_request['pwd'])) {
                    session()->put('user_id', $rowInfo[0]->id);
                    $row->update([
                        'date_login' => jdate('y/m/d'),
                        'day_login' => jdate('l'),
                        'time_login' => jdate('g:i:s'),
                    ]);
                    $this->user_id = $rowInfo[0]->id;
                    return redirect('/');
                } else {
                    return redirect('error');
                }
            } catch (Exception $e) {
                return redirect('error');
            }
        }
    }
    public function RegisterOrder($place_id)
    {
        $userId = session('user_id');
        $filmId = session('film_id');
        try {
            $memberRowInfo = Member::where('id', '=', session('user_id'))->get();
            $filmRowInfo = Film::where('id', '=', session('film_id'))->get();
            $orderTable = new Order();
            $orderTable->who_ordered_id = $memberRowInfo[0]->id;
            $orderTable->who_ordered_name = $memberRowInfo[0]->name;
            $orderTable->order_name = $filmRowInfo[0]->film_name;
            $orderTable->film_id = $filmRowInfo[0]->id;
            $orderTable->date_registered = jdate('y/m/d');
            $orderTable->day_registered = jdate('l');
            $orderTable->time_registered = jdate('g:i:s');
            $orderTable->save();
            return redirect('export-pdf/'.$place_id);
        } catch (Exception $e) {
            return redirect('error');
        }
    }
    public function CreatePdfFile($place_id)
    {
        $sessionVar = session('film_id');
        try {
            $filmInfo = Film::where('id', '=', $sessionVar)->get();
            $orderInfo = Order::where('film_id', '=', $sessionVar)->get();
            $salonLoop = json_decode($filmInfo[0]->salon);
            $dayLoop = json_decode($filmInfo[0]->day);
            $timeLoop = json_decode($filmInfo[0]->time);
            foreach ($salonLoop as $id => $value) {
                if ($id == $place_id) {
                    $salon = $value;
                }
            }
            foreach ($dayLoop as $id => $value) {
                if ($id == $place_id) {
                    $day = $value;
                }
            }
            foreach ($timeLoop as $id => $value) {
                if ($id == $place_id) {
                    $time = $value;
                }
            }
            $placeInfo = Place::where('id', '=', $place_id)->get();
            return view('take_bill', [
                 "order" => $orderInfo,
                "place" => $placeInfo,
                "salon" => $salon,
                "day" => $day,
                "time" => $time,
            ]);
        } catch (Exception $e) {
            return redirect('error');
        }
    }
}
