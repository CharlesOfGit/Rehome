<?php
namespace App\Http\Controllers\Home\Center;

use App\Address;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class AddressController extends BaseController
{
    public function address()
    {
        $cols = Address::where('userid', session()->get('centeruserid'))->get();

        return view("Home.Center.address", ['cols' => $cols]);
    }

    public function selected($id)
    {
        //当前用户的地址状态值 0
        Address::where('userid', session()->get('centeruserid'))->update(['status' => 0]);
        Address::where('id', $id)->update(['status' => 1]);
        return redirect()->back();

    }
    public function update(Request $request)
    {
        $arr = $request->all();
        $id  = $arr['address_id'];
        unset($arr['address_id']);
        unset($arr['_token']);
        $address = Address::find($id);
        foreach ($arr as $k => $v) {
            $address->$k = $v;
        }
        $re = $address->save(); //update
        return redirect()->back();
    }
    public function save(Request $request)
    {
        $arr = $request->all();
        unset($arr['_token']);
        unset($arr['submit']);
        $arr['userid'] = session()->get('centeruserid');
        $address       = new Address();
        foreach ($arr as $k => $v) {
            $address->$k = $v;
        }
        $re = $address->save();
        return redirect()->back();
    }
    public function del($id)
    {
        Address::where('id', $id)->delete();
        return redirect()->back();
    }
}
