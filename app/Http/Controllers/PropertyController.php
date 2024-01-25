<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use App\Models\Photo;

class PropertyController extends Controller
{
    public function view(){
        return view('content.properties.add-property');
    }
    public function index(){
        $properties = Property::with('photoes')->get();
        return view('content.properties.property-list', compact('properties'));
    }
    public function detail($code){
        $property = Property::where('code', $code)->first();
        $photo = Photo::where('code', $code)->get();
        return view('content.properties.property-details', compact('property','photo'));
    }
    public function delete($code){
        $property = Property::where('code', $code)->first();
        if($property) {$property->delete();}
        return response()->json(['success' => true , 'code' => $code]);
    }
    public function search(){
        return view('content.properties.admin-search.admin-search');
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
        $newBuildingImagesPath = 'storage/properties/'.$newBuilding->building_id;

        for ($i = 0; $i < $totalImages; $i++) {
            $image = $req->file('images.' . $i);
            $filename = uniqid('') . '_' . uniqid('') . '.' . $image->getClientOriginalExtension();
            $image->move($newBuildingImagesPath, $filename);

            Photo::create([
                'image' => $filename,
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

    public function verifyStrings(Request $request, $fieldName)
    {
        $value = $request->input($fieldName);
        if (is_null($value) || empty($value)) {
            return '';
        }
        return $value;
    }
}
