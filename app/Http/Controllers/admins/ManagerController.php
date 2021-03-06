<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use zgldh\QiniuStorage\QiniuStorage;
use App\Http\Model\Manager;
use session;
use Hash;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $res = Manager::where('m_name','like','%'.$request->input('search').'%')->
        orderBy('id','asc')->
        paginate($request->input('num',10));

        $count = Manager::where('m_name','like','%'.$request->input('search').'%')->count();
        $last= $res->lastPage();

        return view('admins.manager.index',['res'=>$res,'request'=>$request,'count'=>$count,'last'=>$last]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = Manager::where('id',session('mid'))->first();
        if ($res->auth == 1) {
            return view('admins.manager.add');
        }else{
            return redirect('/admin/manager')->with('msg','对不起，您的权限不够，只有超级管理员可以添加管理员用户');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'm_name' => 'required|regex:/^\w{4,12}$/',
        'm_password' => 'required|regex:/^\S{6,16}$/',
        'repass' => 'same:m_password'

    ],[
        'm_name.required'=>'用户名不能为空',
        'm_name.regex'=>'用户名格式不正确',
        'm_password.required'=>'密码不能为空',
        'm_password.regex'=>'密码格式不正确',
        'repass.same' => '两次密码不一致'

    ]);

        //文件上传
        if($request->hasFile('m_photo')){

        //实例化disk
        $disk = QiniuStorage::disk('qiniu');

        //获取图片文件信息
         $file = $request->file('m_photo');

        //获取后缀
        $suffix = $file->getClientOriginalExtension();

        //拼装新的图片名称
        $fileName = time().rand(100000,999999).'.'.$suffix;

        //存进七牛
        $bool=$disk->put('manager/'.$fileName,file_get_contents($file->getRealPath())); 


/*
        //修改名字
        $name = rand(1111,9999).time();
        //获取后缀
        $suffix = $request->file('m_photo')->getClientOriginalExtension();
        //移动图片
        $request->file('m_photo')->move('./Uploads',$name.'.'.$suffix);*/

        }

        $res = $request->except('_token','m_photo','repass');

        $res['m_photo'] = 'manager/'.$fileName;

        $res['m_password'] = Hash::make($request->input('m_password'));

        $data = Manager::create($res);

        if ($data) {
            return redirect('/admin/manager')->with('msg','添加管理员信息成功');
        }else{
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Manager::where('id',$id)->first();
        return view('admins.manager.edit',['res'=>$res]);
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
         $res = $request->except('_token','_method');
        $data = Manager::where('id',$id)->update($res);

        if ($data) {
            return redirect('/admin/manager')->with('msg','修改成功');
        } else {
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $mid = session('mid');

        if ($mid != $id) {
            $m_photo = Manager::where('id',$id)->first()['m_photo'];

            //实例七牛对象
            $disk = QiniuStorage::disk('qiniu');
            //删除七牛云图片
            $data = $disk->delete($m_photo);

            // var_dump($data);

            if ($data) {
              $info =  Manager::where('id',$id)->delete();
              if ($info) {
                  return redirect('/admin/manager')->with('msg','删除成功');
              } else {
                return back();
              }
            }
        } else {
            return redirect('/admin/manager')->with('msg','不能删除当前用户');
        }

        
    }

    //退出
    public function logout(Request $request)
    {
        $request->session()->forget('mid');
        return redirect('/admin/login');

    }


    //修改头像
     public function editpic(Request $request)
    {
       
        $mid = session('mid');
        $m_name = Manager::where('id',$mid)->first()['m_name'];
        return view('admins.manager.editpic',['m_name'=>$m_name]);

    }

    //执行修改头像
     public function doedit(Request $request)
    {

        //文件上传
                if($request->hasFile('m_photo')){

                $mid = session('mid');
                $m_photo = Manager::where('id',$mid)->first()['m_photo'];

                //实例七牛对象
                $disk = QiniuStorage::disk('qiniu');
                // dd($m_photo);
                //删除七牛云图片
                $res = $disk->delete($m_photo);

                 // dd($res);

                if ($res) {

                    

                //获取图片文件信息
                 $file = $request->file('m_photo');

                //获取后缀
                 $suffix = $file->getClientOriginalExtension();

                //拼装新的图片名称
                 $fileName = time().rand(100000,999999).'.'.$suffix;

                //存进七牛
                  $bool=$disk->put('manager/'.$fileName,file_get_contents($file->getRealPath()));


                //存进数据库、
                 $bool1 = Manager::where('id',$mid)->update(['m_photo'=>'manager/'.$fileName]);



                if ($bool && $bool1) {
                    return redirect('/admin/manager');
                } else {
                    return  back()->withInput();
                }

            } else {
                return  back()->withInput();
            }


        } else {
            return  back()->withInput();
        }

        

    }

}
