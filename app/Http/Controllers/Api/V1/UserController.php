<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(10);

        return $this->SuccessPaginateResponse('All Users Get', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $user = User::findOrFail($id);
        }catch(\Exception $e){
            return $this->ErrorResponse('User Not Found');
        }

        return $this->SuccessResponse('User Return', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $user = User::findOrFail($id);
        }catch(\Exception $e){
            return $this->ErrorResponse('User Not Found');
        }

        try{
            $user->name = $request->name;
            $user->save();
        }catch(\Exception $e){
            return $this->ErrorResponse('User Update Failed');
        }

        return $this->SuccessResponse('User Updated Successfully', $user);
    }

    public function resetPassword(Request $request, $id)
    {
        try{
            $user = User::findOrFail($id);
        }catch(\Exception $e){
            return $this->ErrorResponse('User Not Found');
        }

        try{
            $user->password = Hash::make($request->password);
            $user->save();
        }catch(\Exception $e){
            return $this->ErrorResponse('User Update Failed');
        }

        return $this->SuccessResponse('User Updated Successfully', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user = User::findOrFail($id);
        }catch(\Exception $e){
            return $this->ErrorResponse('User Not Found');
        }

        try{
            $user->delete();
        }catch(\Exception $e){
            return $this->ErrorResponse('User Delete Fail');
        }
        return $this->SuccessResponse('User Deleted');
    }
}
