<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(IS_GET){
            $res=M("bia")->limit(5)->select();
            $this->assign("res",$res);
            $this->display();
        }
    }

    //单删//批删
        public function delete(){
            $n_id=I("get.n_id");
            $g_mess="删除ID为"."$n_id"."的数据";
            $g_time=time();
            $data=array(
                g_mess=>$g_mess,
                g_time=>$g_time
            );
            $where=M("bia")->delete($n_id);
            if($where){
                M("logo")->add($data);
              $this->ajaxreturn(1);
            }
        }


    //即点即改
    public function save(){
        $id=I("get.id");
        $name=I("get.name");
        $data=array(
            "n_name"=>$name,
        );
        $res=M("bia")->where("n_id='$id'")->save($data);
        if($res){
            $this->ajaxreturn(1);
        }
    }


    //查看日志
    public function lists(){
        $res=M("logo")->select();
        $this->assign("res",$res);
        $this->display();
    }

}