<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{
    protected $options;
    protected $properties;

    public function __construct()
    {
        $this->options = DB::table('options')->get();
        $this->properties = DB::table('properties')->get();
    }

    public function view(){
        $options = $this->options;
        $properties = $this->properties;
        return view('content.properties.add-property', compact('options','properties'));
    }
    public function index(){
        // $properties = Property::with('singlephoto')->orderByDesc('building_created_at')->get();
        $properties = Property::orderByDesc('building_created_at')->get();

        return view('content.properties.property-list', compact('properties'));
    }

    public function detail($code){
        $property = Property::where('code', $code)->first();
        $photo = Photo::where('code', $code)->get();
        $options = $this->options;

        return view('content.properties.property-details2', compact('property','photo','options'));
    }

    public function detail2($code){
        $property = Property::where('code', $code)->first();
        $photo = Photo::where('code', $code)->get();
        $options = $this->options;
        return view('content.properties.property-details2', compact('property','photo','options'));
    }

    public function delete($code){
        $property = Property::where('code', $code)->first();
        if($property) {$property->delete();}
        return response()->json(['success' => true , 'code' => $code]);
    }

    public function search(Request $request){
        $options = $this->options;
        return view('content.properties.admin-search.admin-search',compact('options'));
    }
    public function AdminAjaxSearch(Request $request){
        $properties = Property::with('singlephoto');

        // district search
        if(!empty($request->district)){
            $properties->whereIn('district',$request->district);
        }
        // facilities search
        if(!empty($request->facility)){
            $properties->whereIn('facilities',$request->facility);
        }
        // decorations search
        if(!empty($request->decoration)){
            $properties->whereIn('decorations',$request->decoration);
        }
        // types search
        if(!empty($request->type)){
            $properties->whereIn('types',$request->type);
        }
        // others search
        if(!empty($request->other)){
            $properties->whereIn('others',$request->other);
        }
        // building_name search
        if(!empty($request->building_name)){
            $properties->where('building','LIKE',"%{$request->building_name}%");
        }
        // fetch searched data
        // $properties=$properties->paginate(10);
        $properties=$properties->orderByDesc('building_id')->get();

        if($properties) {
            return response()->json(['success' => true, 'properties' => $properties]);
        } else {
            return response()->json(['success' => true, 'msg' => 'Code Avliable']);
        }

    }

    public function loadMore(Request $request)
    {
        $offset = $request->get('offset', 0);
        $limit = 10;

        $properties = Property::skip($offset);

        // district search
        if (!empty($request->district)) {
            $properties->whereIn('district', (array)$request->district);
        }

        // facilities search
        if (!empty($request->facility)) {
            $properties->whereIn('facilities', (array)$request->facility);
        }

        // decorations search
        if (!empty($request->decoration)) {
            $properties->whereIn('decorations', (array)$request->decoration);
        }

        // types search
        if (!empty($request->type)) {
            $properties->whereIn('types', (array)$request->type);
        }

        // others search
        if (!empty($request->other)) {
            $properties->whereIn('others', (array)$request->other);
        }

        // building_name search
        if (!empty($request->building_name)) {
            $properties->where(function ($query) use ($request) {
                $query->where('building', 'LIKE', "%{$request->building_name}%");
            });
        }

        $result = $properties->take($limit)->get();

        return response()->json($result);
    }



    public function verifyCode($code){
        $usedCode = Property::where('code', $code)->first();

        if($usedCode) {
            return response()->json(['success' => false, 'msg' => 'Code already used']);
        } else {
            return response()->json(['success' => true, 'msg' => 'Code Avliable']);
        }
    }
    public function create(Request $req) {
        $code = $this->verifyStrings($req,'code');
        $district = $this->verifyStrings($req,'district');
        $building_name = $this->verifyStrings($req,'building_name');
        $street = $this->verifyStrings($req,'address');
        $year = $this->verifyStrings($req,'year');
        $block = $this->verifyStrings($req,'block');
        $floor = $this->verifyStrings($req,'floor');
        $flat = $this->verifyStrings($req,'flat');
        $no_room = ($this->verifyStrings($req,'no_rooms') == '' ? 0 : $this->verifyStrings($req,'no_rooms'));
        $cargo_lift = $this->verifyStrings($req,'cargo_lift');
        $customer_lift = $this->verifyStrings($req,'customer_lift');
        $tf_hr = $this->verifyStrings($req,'tf_hr');
        $enter_password = $this->verifyStrings($req,'entry_password');
        $agent_name = \auth()->user()->name;

        $landlord_name = $this->verifyStrings($req,'landlord_name');
        $bank = $this->verifyStrings($req,'bank');
        $bank_acc = $this->verifyStrings($req,'bank_acc');
        $remark = $this->verifyStrings($req,'remark');
        $contact_1 = $this->verifyStrings($req,'contact_1');
        $number_1 = $this->verifyStrings($req,'number_1');
        $contact_2 = $this->verifyStrings($req,'contact_2');
        $number_2 = $this->verifyStrings($req,'number_2');
        $contact_3 = $this->verifyStrings($req,'contact_3');
        $number_3 = $this->verifyStrings($req,'number_3');

        $facilities = $this->verifyStrings($req, 'facilities');
        $types = $this->verifyStrings($req, 'types');
        $decorations = $this->verifyStrings($req, 'decoration');
        $others = $req->input('others');
        $other_date = $req->input('others_dates');
        $other_free_formate = $req->input('others_details');

        $gross_sf = $req->input('gross-sf');
        $net_sf = $req->input('net-sf');
        $selling_price = $req->input('selling-price');
        $rental_price = $req->input('rental-price');
        $selling_g = $req->input('selling-gross');
        $selling_n = $req->input('selling-net');
        $rental_g = $req->input('rental-gross');
        $rental_n = $req->input('rental-net');
        $mgmf = $req->input('mgmf');
        $rate = $req->input('rate');
        $land = $req->input('land');
        $oths = $req->input('oths');

        $newBuilding = Property::create([
            'code' => $code,
            'district' => $district,
            'building' => $building_name,
            'street' => $street,
            'year' => $year,
            'block' => $block,
            'floor' => $floor,
            'flat' => $flat,
            'no_room' => $no_room,
            'cargo_lift' => $cargo_lift,
            'customer_lift' => $customer_lift,
            'tf_hr' => $tf_hr,
            'enter_password' => $enter_password,
            'display_by' => '',
            'individual' => '',
            'separate' => '',
            'agent_name' => $agent_name,
            'building_created_at' => now(),

            'landlord_name' => $landlord_name,
            'bank' => $bank,
            'bank_acc' => $bank_acc,
            'remarks' => $remark,
            'landlord_created_at' => now(),
            'contact1' =>  $contact_1,
            'number1' =>  $number_1,
            'contact2' =>  $contact_2,
            'number2' =>  $number_2,
            'contact3' =>  $contact_3,
            'number3' =>  $number_3,

            'facilities' => $facilities,
            'types' => $types,
            'decorations' => $decorations,
            'others' => $others,
            'other_date' => $other_date,
            'other_free_formate' => $other_free_formate,

            'gross_sf' => $gross_sf,
            'net_sf' => $net_sf,
            'selling_price' => $selling_price,
            'selling_g' => $selling_g,
            'selling_n' => $selling_n,
            'rental_price' => $rental_price,
            'rental_g' => $rental_g,
            'rental_n' => $rental_n,
            'mgmf' => $mgmf,
            'rate' => $rate,
            'land' => $land,
            'oths' => $oths,
        ]);

        $totalImages = $req->input('totalImages');
        $newBuildingImagesPath = 'storage/app/public/properties/'.$newBuilding->code;

        if (!File::isDirectory($newBuildingImagesPath)) {
            mkdir($newBuildingImagesPath, 0777, true);
        }


        for ($i = 0; $i < $totalImages; $i++) {
            $image = $req->file('images.' . $i);
            $filename = uniqid('') . '.' . $image->getClientOriginalExtension();
            $image->move($newBuildingImagesPath, $filename);

            Photo::create([
                'image' => $newBuilding->code.'/'.$filename,
                'code' => $newBuilding->code,
                'image_created_at' => now(),
                'room_number' => '',
                'image_watermark' => '',
                'image_resized' => '',
                'size' => '',
                'price' => '',
            ]);
        };

        return response()->json(['success' => true,'name' => $newBuilding->building]);
    }
    public function uploadImage(Request $request)
    {
        // Retrieve the total number of images


        return response()->json(['success' => true]);
    }
    public function updateContacts(Request $req) {
        $con = $req->input("contacts");
        $num = $req->input("numbers");
        $id = $req->input("id");
        for ($i = 0; $i < 3; $i++) {
            Property::where('building_id', $id)->update([
                'contact' . ($i + 1) => $con[$i]['contact'],
                'number' . ($i + 1) => $num[$i]['number'],
            ]);
        }

        $data = ['contacts' => $con[0]['contact']];
        return response()->json($data, 200);
    }

    public function verifyStrings(Request $request, $fieldName)
    {
        $value = $request->input($fieldName);
        if (is_null($value) || empty($value)) {
            return '';
        }
        return $value;
    }

    public function FileSave(){

        $properties=Property::all();
        foreach ($properties as $key => $value) {

            // $photos=Photo::where('code',$value->code)->where('saved',0)->get();

            // foreach($photos as $photo){
            //     if($photo->image != null && $photo->image != ''){

                    // $imageUrl = 'https://boshinghk.com/spms/images/'.$photo->image; //asset('storage/properties/'.$value->building_id.'/'.$photo->image);

                    // $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION);

                    // $basename = basename($imageUrl);

                    // $name = explode('.'.$extension,$basename);
                    // $name = $name[0];
                    // // dd($name);
                    // $image = file_get_contents($imageUrl);

                    $target_dir = 'storage/app/public/images/'.$value->code;

                    if (!File::isDirectory($target_dir)) {
                        // mkdir($target_dir, 0777, true);
                        echo $value->code.'====<br>';
                    }


                    // if(file_put_contents($target_dir.'/'.$name.'.'.$extension, $image)){
                    //     $photo->saved = 1;
                    //     $photo->save();
                    // }else{
                    //     dd('else');
                    // }

            //     }


            // }

        }

    }

    public function BuildingNameCheck($code){
        $buildingData = Property::where('building_id', $code)->select('building_id', 'building', 'street', 'year')->first();
        if($buildingData) {
            return response()->json(['success' => true, 'buildingData' => $buildingData]);
        } else {
            return response()->json(['success' => false, 'msg' => 'Not Avliable']);
        }
    }

}
