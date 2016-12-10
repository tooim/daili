<?php
namespace Admin\Controller;
use Admin\Controller;
class DetailController extends BaseController{
            function get_row($fid){
                 $row=M('w_dls_articles')->where("fid={$fid}")->select();
                 return $row;
            }
            //获取我的推广
            function get_row_wdtg($fid){
                
                $row=M('w_dls_articles')->where("fid={$fid}")->order('time desc')->select();
                 foreach ($row as $key => $v_lntc) {
                    $url=U(MODULE_NAME.'/art/press?id='.$v_lntc['id']);
                    if($v_lntc['keywords']==""){
                        $str=$v_lntc['title'];
                    }else{
                        $str=$v_lntc['keywords'];
                    }
                  $lntc_str.="<a href='{$url}' target='_blank'><dl  class='dl_ri'><dt><img src='{$v_lntc['pics']}' title='{$v_lntc['title']}'/></dt><dd>{$str}</dd></dl></a>"; 
                }
                        return $lntc_str;
            }
                function wdtg(){
                    //理念题材
                    $lntc=$this->get_row_wdtg(6);
                    //教练题材
                    $jltc=$this->get_row_wdtg(40);
                    //优惠题材
                    $yhtc=$this->get_row_wdtg(21);
                    //考试题材
                    $kstc=$this->get_row_wdtg(22);
                    //资源题材
                    $zytc=$this->get_row_wdtg(23);;
                    $this->assign('lntc',$lntc);
                    $this->assign('jltc',$jltc);
                    $this->assign('yhtc',$yhtc);
                    $this->assign('kstc',$kstc);
                    $this->assign('zytc',$zytc);
                    $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
               // public function menu(){
               //     $re=M('W_addls')->where("fid=0")->select();
               //          foreach ($re as $v) {
               //              $menu="";
               //              $top= "<h1>{$v['name']}</h1>";
               //              $re1=M('W_addls')->where("fid={$v['id']}")->select(); 
               //              foreach ($re1 as $v1) {
               //              $menu.="<li><a href='' >{$v1['name']}</a></li>";
               //              }
               //              $str.=$top.$menu;
               //          }
               //      $this->assign('str',$str);
               //      $this->display();
                  
               //  } 
                function wdyhj(){
                   $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
                function wdzl(){
                   $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
                //获取营销素材
                function get_row_yxsc($fid){
                     $row=M('w_dls_articles')->where("fid={$fid}")->limit(5)->order('time desc')->select();
                     foreach ($row as $key => $v ){
                        $url=U(MODULE_NAME.'/art/yingxiao?id='.$v['id']);
                        $lntc_str.="<dl><a href='{$url}' target='_blank'><dt><img src='{$v['pics']}'/></dt><dd><h2>标题：{$v['title']}</h2><p>简介：{$v['introduce']}</p><p>作者：{$v['author']}</p>
                        <a href='art/yingxiao/id/{$v['id']}' target='_blank'><span>查看</span></a></dd></a></dl>";
                        }
                        return $lntc_str;
                 }
                 
                function yxsc(){
                    $rw=$this->get_row_yxsc(24);
                    $wj=$this->get_row_yxsc(26);
                    $zx=$this->get_row_yxsc(27);
                    $fa=$this->get_row_yxsc(28);
                    $sp=$this->get_row_yxsc(29);
                    $this->assign('rw',$rw);
                    $this->assign('wj',$wj);
                    $this->assign('zx',$zx);
                    $this->assign('fa',$fa);
                    $this->assign('sp',$sp);
                    $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
                //近期活动
                function jqhd(){
                    $action=$this->get_row_wdtg(34);
                    $this->assign('action', $action);
                    $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
                //考试公告
                function get_row_ksgg($class){
                   $row=M('w_exam')->where("class='{$class}'")->limit(5)->order('times desc')->select();
                    $str="";
                    foreach ($row as $k => $v) {
                        if($k==0){
                            $str.="<div class='dv_1'><span>{$v['content']}<a style='text-indent:0' href='k_1' class='but'>提交名单</a></span></div>";
                        }else{
                            $str.="<div class='dv_2'><p>{$v['content']}</p></div>";
                        }
                    }
                    return $str;
                }
                function ksgg(){
                    $row1=$this->get_row_ksgg("科目一");
                    $row2=$this->get_row_ksgg("科目二");
                    $row3=$this->get_row_ksgg("科目三");
                    $row4=$this->get_row_ksgg("科目四");
                    $this->assign('row1', $row1);
                    $this->assign('row2', $row2);
                    $this->assign('row3', $row3);
                    $this->assign('row4', $row4);
                    $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
                function qxgl(){
                    $row=M('w_dls_cate')->where('level='.$_COOKIE['pid'])->getfield('cname');
					$time = date('Y年m月d日',time());
                    $this->assign('a', "123");  
                    $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->assign('runtel',$_COOKIE['runtel']);
                    $this->assign('address',$_COOKIE['address']);
                    $this->assign('level',$row);
					$this->assign('time',$time);
                    $this->display();
                }
                //图片上传
                public function upload(){
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize   =     3145728 ;// 设置附件上传大小
                    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                    $upload->rootPath  =     "./Public/Uploads/"; // 设置附件上传根目录
                    $upload->savePath  =     ''; // 设置附件上传（子）目录
                    // 上传文件
                    $info   =   $upload->upload();
                    if(!$info) {// 上传错误提示错误信息
                        $this->error($upload->getError());
                    }else{// 上传成功
                        $this->success('上传成功！');
                    }
                }
                //手机验证码
                 function send(){
                    $tel = trim(I('post.tel'));
                    $send = rand(100000,999999);
                    $text = '尊敬的易学车代理,您本次修改支付密码的验证码为'.$send.'请勿转告他人，以免造成不必要的损失[易学车]';
                    //var_dump($tel);exit;
                    $name = '029jp';
                    $pwd = md5('123456');
                        $url = "http://www.96888sms.cn/api.php/open/send/name/$name/pwd/$pwd/phone/$tel/msg/$text";
                        $result = file_get_contents($url);
                        $now=date('Y-m-d H:i:s',time());
                        if($result){
                            $user = M('code');
                            $data['code']=$send;
                            $data['create_time']=$now;
                            $res = $user->add($data);
                            //setcookie('send',$send,0,'/');
                            if(!empty($res)){
                                echo 1; exit;
                            }else{
                                echo 0;exit;
                            }
                        }
                    
                }
                //修改支付密码
                function pwd(){
                    $now = date('Y-m-d H:i:s',time()-600);
                    $pwd = md5(I('post.pwd'));
                    $send =I('post.send');
                    $row=M('code')->where("code='$send' AND create_time>'$now'")->find();
                    //var_dump($row);
                    if(!empty($row)){
                     $user=M('w_dls');
                     $data['pwd_zf'] = $pwd;
                     $res=$user->where('phone='. $_COOKIE['phone'])->save($data);
                     if(!empty($res)){
                         echo 0;    //修改成功
                         return false;
                     }else{
                         echo 1;    //修改失败
                         return false;
                     }
                    }else{
                        echo 2;     //验证码错误
                        return false;
                    }
                }
                //修改登录密码
                function pwd_dl(){
                    $now = date('Y-m-d H:i:s',time()-600);
                    $pwd = md5(I('post.pwd'));
                    $send =I('post.send');
                    $row=M('code')->where("code='$send' AND create_time>'$now'")->find();
                    //var_dump($row);
                    if(!empty($row)){
                        $user=M('w_dls');
                        $data['password'] = $pwd;
                        $res=$user->where('phone='. $_COOKIE['phone'])->save($data);
                        if(!empty($res)){
                            echo 0;    //修改成功
                            return false;
                        }else{
                            echo 1;    //修改失败
                            return false;
                        }
                    }else{
                        echo 2;     //验证码错误
                        return false;
                    }
                }
                //代理推荐
                function dls_2(){
                    $now = date('Y-m-d H:i:s',time()-600);
                    $name = I('post.name');
                    $phone = I('post.phone');
                    $send = I('post.send');
                    $shop = I('post.shop');
                    $status = I('post.status');
                    $time = date('Y-m-d H:i:s',time());
                    $res = M('code')->where("code='$send' AND create_time>'$now'")->find();   //根据数据库数据验证接收的验证码
                    if(!empty($res)){                           //判断验证码是否正确
                        $data['name'] = $name;
                        $data['phone'] = $phone;
                        if(!empty($shop)){
                            $data['shop'] = $shop;
                        }
                        $data['manager'] = $_COOKIE['name'];
                        $data['time'] = $time;
                        $data['status'] = $status;
                        $save = M('w_dls_2')->add($data);
                        $this->success('提交成功');
                    }else{
                        //错误页面的默认跳转页面是返回前一页，通常不需要设置
                        $this->error('验证码错误');
                    }
                    
                }
                //教练推荐
                function w_jl(){
                    $now = date('Y-m-d H:i:s',time()-600);
                    $name = I('post.jl_name');
                    $phone = I('post.jl_phone');
                    $send = I('post.send');
                    $status = I('post.status');
                    $time = date('Y-m-d H:i:s',time());
                    $res=M('code')->where("code='$send' AND create_time>'$now'")->find();   //根据数据库数据验证接收的验证码
                    if(!empty($res)){
                        /**
                         * 图片上传
                         * @var unknown
                         */
                        $upload = new \Think\Upload();// 实例化上传类
                        $upload->maxSize   =     3145728 ;// 设置附件上传大小
                        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                        $upload->rootPath  =     "./Public/Uploads/"; // 设置附件上传根目录
                        $upload->savePath  =     ''; // 设置附件上传（子）目录
                        // 上传文件
                        $info   =   $upload->upload();
                        if(!$info) {// 上传错误提示错误信息
                            $this->error($upload->getError());
                        }else{// 上传成功
                            //文件保存根目录
                            $data['name'] = $name;
                            $data['phone'] = $phone;
                            $data['status'] = $status;
                            $data['time'] = $time;
                            $data['chief'] = $_COOKIE['name'];
                            $data['jspic'] = $upload->rootPath . $info['file9']['savepath'] . $info['file9']['savename'];      //驾驶证
                            $data['jlpic'] = $upload->rootPath . $info['file10']['savepath'] . $info['file10']['savename'];    //教练证
                            $data['sfpic'] = $upload->rootPath . $info['file11']['savepath'] . $info['file11']['savename'];    //身份证
                            $data['zzpic'] = $upload->rootPath . $info['file12']['savepath'] . $info['file12']['savename'];    //教练着装上身照
                            //print_r($_FILES);
                            if(!empty($_FILES['file13']['name'])){      // 判断上传的是否为空
                                $data['xspic'] = $upload->rootPath . $info['file13']['savepath'] . $info['file13']['savename'];    //车辆行驶证
                            }
                        
                            if(!empty($_FILES['file14']['name'])){
                                $data['bxpic'] = $upload->rootPath . $info['file14']['savepath'] . $info['file14']['savename'];    //车辆保险大单
                            }
                            if(!empty($_FILES['file15']['name'])){
                                $data['clpic'] = $upload->rootPath . $info['file15']['savepath'] . $info['file15']['savename'];    //车辆统一形象照
                            }
                            $save = M('w_tj_jl')->add($data);
                            $this->success('提交成功！');
                        }
                    }else{
                        $this->error('验证码错误');
                    }
                }
                function hygl(){
                   $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
                function zhmx(){
                    $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
                function zxbd(){
                    
                    if($_GET['tel']){
                       $re=M('w_vip')->where("tel={$_GET['tel']}")->find();
                               if($re['type']=="0"){
                                    echo json_encode(array('status'=>a));exit;
                               }else{
                                    echo json_encode(array('status'=>b));exit;
                               }
                                  
                    }
                    //密码

                    if($_POST['password']){
                            $password=md5($_POST['password']);
                            $check=M('w_dls')->where("phone={$_COOKIE['phone']} and password='{$password}'")->find();
                            if(!$check){
                                echo json_encode(array('status'=>3));exit;
                            }
                            //会员
                            if(!empty($_POST['tel'])){
                               $re=M('w_vip')->where("tel={$_POST['tel']}")->find();
                               if($re['type']=="0"){
                                    //余额判断
                                        $price=$check['price']-$_POST['price'];
                                       if($price<0){
                                            //余额不足
                                            echo json_encode(array('status'=>4));exit;
                                       }else{
                                            echo json_encode(array('status'=>1));exit;
                                       }
                                }else if($re['type']==1){
                                    echo json_encode(array('status'=>2)); exit;
                                }else{
                                    echo json_encode(array('status'=>0)); exit;
                                }
                            }
                       
                    }
                    $dls=M('w_dls')->where("phone={$_COOKIE['phone']}")->find();
                    $len=mb_strlen($dls['allowid']);
                    $shop=mb_substr($dls['allowid'],6,$len-6,'utf-8');
                    setcookie('price',$dls['price'],0,'/');
                   
                    $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $dls['price']);
                    $this->assign('runtel', $dls['runtel']);
                    $this->assign('shop',$shop);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
                function dxqf(){
                    $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
                function sqzc(){
                   $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
                function yjtj(){
                   $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
                 function ljyxc(){
                   $this->assign('phone', $_COOKIE['phone']);
                    $this->assign('address', $_COOKIE['address']);
                    $this->assign('price', $_COOKIE['price']);
                    $this->assign('name', $_COOKIE['name']);
                    $this->display();
                }
                function zxbd_tj(){
                   $alert="$('#fullbg').hide();";
                    if($_GET['seek']){
                        $row=M("w_classorder")->where("{$_GET['seek']}='{$_GET['val']}'")->find();
                        if($row==""){
                            $alert= "$('.qin').text('没有检测到信息');$('#dialog').show();$('#fullbg').show();";
                       }

                    }
                    if($_POST){
                       M('w_classorder')->sfz=$_POST['idcard'];
                       M('w_classorder')->hjhome=$_POST['hjhome'];
                       $re=M('w_classorder')->where("tel={$_POST['tel']}")->save();
                       if($re){
                           $alert= "$('.qin').text('本次数据已提交成功，请继续做好后续学员数据健全工作。');$('#dialog').show();$('#fullbg').show();";
                       }
                    }
                     $this->assign('alert', $alert);
                     $this->assign('row', $row);
                     $this->display();

                }
                function zxbd1(){
                    $password=md5($_POST['password']);
                    $check=M('w_dls')->where("phone={$_COOKIE['phone']} and password='{$password}'")->find();
                //学员升级会员
                            M('w_vip')->type=1;
                            M('w_vip')->name=$_POST['name'];
                            $save_vip=M('w_vip')->where("tel={$_POST['phone']}")->save();
                            if($save_vip==true){
                                //获取学员id 产生订单
                                $re_vip=M('w_vip')->where("tel={$_POST['phone']}")->find();
                                switch ($_POST['meal']) {
                                    case '1580':
                                      $clname="考训分离 随心班 ";
                                        break;
                                    case '6800':
                                      $clname="快速拿照 无忧班 ";
                                        break;
                                    case '9800':
                                       $clname="贵宾尊享 金牌班 ";
                                        break;
                                    default:
                                       $clname="传统计时 实惠班"; 
                                        break;
                                }
                                $oid=time().mt_rand(1000,9999);
                                $data['name']=$_POST['name'];
                                $data['tel']=$_POST['phone'];
                                $data['price']=$_POST['price'];
                                $data['vid']=$re_vip['id'];
                                $data['oid']=$oid;
                                $data['debt']=$_POST['meal']-$_POST['price']-$_POST['yhj'];
                                $data['yhj']=$_POST['yhj'];
                                $data['yqman']=$check['name'];
                                $data['pay_type']="余额支付";
                                $data['clname']=$clname;
                                $data['times']=time();
                                if($data['debt']<0){
                                    M('w_vip')->money=-$data['debt'];
                                   $save_vip=M('w_vip')->where("tel={$_POST['phone']}")->save();
                                   $data['debt']=0;
                                }
                                $add_order=M('w_classorder')->add($data);
                                    if($add_order==true){
                                       //扣除余额
                                            $price=$check['price']-$_POST['price'];
                                            M('w_dls')->price=$price;
                                            $dls_p=M('w_dls')->where("phone={$_COOKIE['phone']} and password='{$password}'")->save(); 
                                            if($dls_p==true){
                                                //报名成功
                                                echo json_encode(array('status'=>5)); exit;
                                            }else{
                                                //报名失败
                                                echo json_encode(array('status'=>6));exit;
                                            }
                                    }     
                            }
                           
                    
                }
                
                
                
                
                
                
                
}


















