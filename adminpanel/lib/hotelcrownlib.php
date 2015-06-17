<?php

include "webconfig.php";

class hotelcrownlib extends webconfig {

    function filterstring($data)
    {
        $result = $data;
        if ($result != "")
        {
            $result=str_replace("'","&rsquo;",$data);
            $result=str_replace("script","",$result);
            $result=str_replace("--","",$result);
            $result=str_replace("[","",$result);
            $result=str_replace("]","",$result);
            $result=str_replace("fopen","",$result);
            $result=str_replace("fclose","",$result);
            $result=str_replace("exec","",$result);
            $result=str_replace("<?","",$result);
            $result=str_replace("<?php","",$result);
            $result=str_replace("?>","",$result);
            //$result=str_replace(";","",$result);
            //$result=str_replace("&"," and ",$result);
            return $result;
        }
        return $result;
    }

    function login()
    {
        $user=$this->filterstring($_POST['username']);
        $pass=md5($this->filterstring($_POST['password']));
        $sql="SELECT * FROM hc_login where BINARY username=BINARY '$user' AND BINARY password=BINARY'$pass'";
        $res= $this->mysqli->query($sql);
        $data=$res->fetch_array(MYSQLI_ASSOC);
        if ($res->num_rows>0)
        {
            $_SESSION['loginstatus']="true";
            $_SESSION['username']=$data['username'];
            $_SESSION['message']="Login Successfull!!";
            header('location:dashboard.php');
        }
        else
        {
            $_SESSION['loginstatus']="false";
            $_SESSION['message']="Ooops!! Missed Some Thing Please Check Your Credentials";
            header('location:index.php');
        }
    }


//about us
    public function getaboutuscontents()
    {
        $sql="select description from hc_aboutus where id='1'";
        $qry=$this->mysqli->query($sql);
        $result=$qry->fetch_array(MYSQLI_ASSOC);
        if(count($result)>0)
        {
            $result['errorcode']=0;
            return $result;
        }
        else
        {
            $result['errorcode']=1;
            return $result;
        }
    }

    public function updateaboutuscontents($description)
    {
        date_default_timezone_set("Asia/Kathmandu");
        $date=date("Y-m-d h:i:sa");
        $gs=new getstatic();
        $user=$gs->getuser();
        $sql="UPDATE hc_aboutus SET description='$description',modifieddate='$date',modifiedby='$user' WHERE id='1'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            $_SESSION['msg']="About Us Content Edited Successfully!!!";
            header('location:'.$gs->home_base_url().'aboutus.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="About Us Content Edit Failed!!!";
            header('location:'.$gs->home_base_url().'aboutus.php');
            exit();
        }
    }


//features
    public function getfeaturesuscontents()
    {
        $sql="select description from hc_features where id='1'";
        $qry=$this->mysqli->query($sql);
        $result=$qry->fetch_array(MYSQLI_ASSOC);
        if(count($result)>0)
        {
            $result['errorcode']=0;
            return $result;
        }
        else
        {
            $result['errorcode']=1;
            return $result;
        }
    }

    public function updatefeaturescontents($description)
    {
        $date=date("Y-m-d h:i:sa");
        $gs=new getstatic();
        $user=$gs->getuser();
        $sql="UPDATE hc_features SET description='$description',modifieddate='$date',modifiedby='$user' WHERE id='1'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            $_SESSION['msg']="Our Features Content Edited Successfully!!!";
            header('location:'.$gs->home_base_url().'features.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="Our Features Content Edit Failed!!!";
            header('location:'.$gs->home_base_url().'features.php');
            exit();
        }
    }


//news
    public function getnewslists()
    {
        $result=array();
        $sql="select * from hc_news ORDER by createddate DESC ";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }

    public function addnewsandevents()
    {
        $gs=new getstatic();
        $title=$gs->filterstring($_POST['title']);
        $description=$_POST['description'];
        $createddate=date("Y-m-d h:i:sa");
        $createdby=$gs->getuser();
        $status=$gs->filterstring($_POST['status']);
        $sql="INSERT INTO hc_news
              (title,description,createddate,createdby,status) VALUES
              ('$title','$description','$createddate','$createdby','$status')";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            $_SESSION['msg']="News/Events Has Been Added Successfully!!!";
            header('location:'.$gs->home_base_url().'newslists.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="News/Events Could Not Be Added Successfully!!!";
            header('location:'.$gs->home_base_url().'newslists.php');
            exit();
        }
    }

    public function changenewsstatus($id)
    {
        $gs=new getstatic();
        $sql="update hc_news set status = CASE
              WHEN status = 'active' THEN 'inactive'
              ELSE 'active'
              END
              where id='$id'" ;
        $qry=$this->mysqli->query($sql);

        if($qry)
        {
            $_SESSION['msg']="Status Changed Successfully!!!";
            header('location:'.$gs->home_base_url().'newslists.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="Status Change Failure!!!";
            header('location:'.$gs->home_base_url().'newslists.php');
            exit();
        }
    }

    public function deletenews($id)
    {
        $gs=new getstatic();
        $sql="DELETE from hc_news where id='$id'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            $_SESSION['msg']="News Has Been Deleted Successfully!!!";
            header('location:'.$gs->home_base_url().'newslists.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="News Could Not Be Deleted Successfully!!!";
            header('location:'.$gs->home_base_url().'newslists.php');
            exit();
        }
    }

    public function geteditcontents($id)
    {
        $gs=new getstatic();
        $sql="select * from hc_news where id='$id'";
        $qry=$this->mysqli->query($sql);
        $result=$qry->fetch_array(MYSQLI_ASSOC);
        if(count($result)>0)
        {
            $_SESSION['editnewscontents']=$result;
            header('location:'.$gs->home_base_url().'newsandevents.php?errocode=0&data='.$_SESSION['editnewscontents']);
            exit();
        }
        else
        {
            $_SESSION['editblogsdetail']=$result;
            header('location:'.$gs->home_base_url().'newsandevents.php?errorcode=1');
            exit();
        }
    }

    public function getupdatedcontents()
    {
        $gs=new getstatic();
        $id=$_POST['newsid'];
        $title=$gs->filterstring($_POST['title']);
        $description=$_POST['description'];
        $modifieddate=date("Y-m-d h:i:sa");
        $modifiedby=$gs->getuser();
        $status=$gs->filterstring($_POST['status']);
        $sql="UPDATE hc_news SET title='$title', description='$description',modifieddate='$modifieddate',
modifiedby='$modifiedby',status='$status' WHERE id='$id'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            $_SESSION['msg']="News/Events Has Been Edited Successfully!!!";
            header('location:'.$gs->home_base_url().'newslists.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="News/Events Could Not Be Edited Successfully!!!";
            header('location:'.$gs->home_base_url().'newslists.php');
            exit();
        }
    }



//change password
    public function changepassword()
    {
        $gs=new getstatic();
        $oldpassword=md5($_POST['oldpassword']);
        $newpassword=md5($_POST['newpassword']);
        $username=$gs->getuser();

        $sql="select password from hc_login where username='$username' and password='$oldpassword'";
        $qry=$this->mysqli->query($sql);
        $row=$qry->fetch_array(MYSQLI_ASSOC);
        if(count($row)>0)
        {
            $sql1="update hc_login set password='$newpassword' WHERE username='$username' and password='$oldpassword'";
            $qry2=$this->mysqli->query($sql1);
            if($qry2)
            {
                $_SESSION['msg']="Password Changed Successfully!!!";
                header('location:'.$gs->home_base_url().'password.php');
                exit();
            }
        }
        else
        {
            $_SESSION['msg']="Old Password Does Not Match!!!";
            header('location:'.$gs->home_base_url().'password.php');
            exit();
        }
    }



//photo gallery
    public function getphotolists()
    {
        $result=array();
        $sql="SELECT * FROM hc_gallery ORDER BY createddate DESC";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }

    public function addphototogallery()
    {
        $gs=new getstatic();
        $imagedescription=$gs->filterstring($_POST['description']);
        $status=$gs->filterstring($_POST['status']);
        $createddate=date("Y-m-d h:i:sa");
        $createdby=$gs->getuser();
        //cover image test
        $image=$_FILES['image']['name'];
        $imagresult=$gs->imagemanipulate($image);
        if($imagresult['errorcode']=="0")
        {
            $imagename=$imagresult['msg'];
        }
        else
        {
            $_SESSION['msg']="Only JPG and PNG Images Are Allowed!!";
            header('location:'.$gs->home_base_url().'photolists.php');
            exit();
        }

        $sql="INSERT into hc_gallery(image,description,status,createddate,createdby) VALUES
              ('$imagename','$imagedescription','$status','$createddate','$createdby')";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], "images/".$imagename);
            $_SESSION['msg']="Image Has Been Successfully Added To Your Photo Gallery!!!";
            header('location:'.$gs->home_base_url().'photolists.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="Image Could Not Be Successfully Added To Your Photo Gallery!!!";
            header('location:'.$gs->home_base_url().'photolists.php');
            exit();
        }

    }

    public function changeimagestatus($id)
    {
        $gs=new getstatic();
        $sql="update hc_gallery set status = CASE
              WHEN status = 'active' THEN 'inactive'
              ELSE 'active'
              END
              where id='$id'" ;
        $qry=$this->mysqli->query($sql);

        if($qry)
        {
            $_SESSION['msg']="Status Changed Successfully!!!";
            header('location:'.$gs->home_base_url().'photolists.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="Status Change Failure!!!";
            header('location:'.$gs->home_base_url().'photolists.php');
            exit();
        }
    }

    public function deleteimage($id,$image)
    {
        $gs=new getstatic();
        $sql="delete from hc_gallery where id='$id'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            unlink('images/'.$image);
            $_SESSION['msg']="Image Deleted Successfully!!!";
            header('location:'.$gs->home_base_url().'photolists.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="Image Delete Failure!!!";
            header('location:'.$gs->home_base_url().'photolists.php');
            exit();
        }
    }



//accomodation and rooms
    public function addrooms()
    {
        $gs=new getstatic();
        $title=$gs->filterstring($_POST['title']);
        $description=$_POST['description'];
        $status=$gs->filterstring($_POST['status']);
        $createddate=date("Y-m-d h:i:sa");
        $createdby=$gs->getuser();
        //cover image test
        $image=$_FILES['image']['name'];
        $imagresult=$gs->imagemanipulate($image);
        if($imagresult['errorcode']=="0")
        {
            $imagename=$imagresult['msg'];
        }
        else
        {
            $_SESSION['msg']="Only JPG and PNG Images Are Allowed!!";
            header('location:'.$gs->home_base_url().'accomodationlists.php');
            exit();
        }

        $sql="INSERT into hc_rooms(image,title,description,status,createddate,createdby) VALUES
              ('$imagename','$title','$description','$status','$createddate','$createdby')";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], "images/".$imagename);
            $_SESSION['msg']="Accomodation And Rooms Has Been Successfully Added!!!";
            header('location:'.$gs->home_base_url().'accomodationlists.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="Accomodation and Rooms Could Not Be Added";
            header('location:'.$gs->home_base_url().'accomodationlists.php');
            exit();
        }
    }

    public function getroomlists()
    {
        $result=array();
        $sql="SELECT * FROM hc_rooms ORDER BY createddate DESC";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }

    public function changeroomsstatus($id)
    {
        $gs=new getstatic();
        $sql="update hc_rooms set status = CASE
              WHEN status = 'active' THEN 'inactive'
              ELSE 'active'
              END
              where id='$id'" ;
        $qry=$this->mysqli->query($sql);

        if($qry)
        {
            $_SESSION['msg']="Status Changed Successfully!!!";
            header('location:'.$gs->home_base_url().'accomodationlists.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="Status Change Failure!!!";
            header('location:'.$gs->home_base_url().'accomodationlists.php');
            exit();
        }
    }

    public function deleterooms($id,$image)
    {
        $gs=new getstatic();
        $sql="delete from hc_rooms where id='$id'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            unlink('images/'.$image);
            $_SESSION['msg']="Rooms And Accomodation Details Deleted Successfully!!!";
            header('location:'.$gs->home_base_url().'accomodationlists.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="Rooms And Accomodation Details Delete Failure!!!";
            header('location:'.$gs->home_base_url().'accomodationlists.php');
            exit();
        }
    }

    public function geteditrooms($id)
    {
        $gs=new getstatic();
        $sql="select * from hc_rooms where id='$id'";
        $qry=$this->mysqli->query($sql);
        $result=$qry->fetch_array(MYSQLI_ASSOC);
        if(count($result)>0)
        {
            $_SESSION['editroomscontents']=$result;
            header('location:'.$gs->home_base_url().'accomodation.php?errorcode=0&data='
                .$_SESSION['editroomscontents']);
            exit();
        }
        else
        {
            $_SESSION['editroomscontents']=$result;
            header('location:'.$gs->home_base_url().'accomodation.php?errorcode=1');
            exit();
        }
    }

    public function editupdatedrooms($id)
    {
        $gs=new getstatic();
        $title=$gs->filterstring($_POST['title']);
        $description=$_POST['description'];
        $status=$gs->filterstring($_POST['status']);
        $modifieddate=date("Y-m-d h:i:sa");
        $modifiedby=$gs->getuser();
        $sql="UPDATE hc_rooms SET title='$title', description='$description',modifieddate='$modifieddate',
modifiedby='$modifiedby',status='$status' WHERE id='$id'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            $_SESSION['msg']="Rooms/Accomodation Has Been Edited Successfully!!!";
            header('location:'.$gs->home_base_url().'accomodationlists.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="Rooms/Accomodation Could Not Be Edited Successfully!!!";
            header('location:'.$gs->home_base_url().'accomodationlists.php');
            exit();
        }
    }


//image sliders


    public function addslider()
    {
        $gs=new getstatic();
        $status=$gs->filterstring($_POST['status']);
        //cover image test
        $image=$_FILES['image']['name'];
        $imagresult=$gs->imagemanipulate($image);
        if($imagresult['errorcode']=="0")
        {
            $imagename=$imagresult['msg'];
        }
        else
        {
            $_SESSION['msg']="Only JPG and PNG Images Are Allowed!!";
            header('location:'.$gs->home_base_url().'imageslider.php');
            exit();
        }

        $sql="INSERT into hc_sliders(image,status) VALUES
              ('$imagename','$status')";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], "images/".$imagename);
            $_SESSION['msg']="Image Has Been Successfully Added To Your Slider Lists!!!";
            header('location:'.$gs->home_base_url().'imageslider.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="Image Could Not Be Successfully Added To Your Slider Lists!!!";
            header('location:'.$gs->home_base_url().'imageslider.php');
            exit();
        }
    }

    public function getimagsliderlists()
    {
        $result=array();
        $sql="select * from hc_sliders ORDER by id DESC";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }

    public function changesliderstatus($id)
    {
        $gs=new getstatic();
        $sql="UPDATE hc_sliders SET status = CASE
              WHEN status = 'active' THEN 'inactive'
              ELSE 'active'
              END
              where id='$id'" ;
        $qry=$this->mysqli->query($sql);

        if($qry)
        {
            $_SESSION['msg']="Status Changed Successfully!!!";
            header('location:'.$gs->home_base_url().'imageslider.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="Status Change Failure!!!";
            header('location:'.$gs->home_base_url().'imageslider.php');
            exit();
        }
    }

    public function deletesliderimage($id, $image)
    {
        $gs=new getstatic();
        $sql="delete from hc_sliders where id='$id'";
        $qry=$this->mysqli->query($sql);
        if($qry)
        {
            unlink('images/'.$image);
            $_SESSION['msg']="Image Deleted Successfully!!!";
            header('location:'.$gs->home_base_url().'imageslider.php');
            exit();
        }
        else
        {
            $_SESSION['msg']="Image Delete Failure!!!";
            header('location:'.$gs->home_base_url().'imageslider.php');
            exit();
        }
    }


//client side requirements

    public function getnewslistsclient()
    {
        $result=array();
        $sql="select * from hc_news where status='active' ORDER by createddate DESC limit 5 ";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }

    public  function getparticularnews($id)
    {
        $result=array();
        $sql="select * from hc_news where id='$id'";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }

    public function getphotolistsclient()
    {
        $result=array();
        $sql="SELECT * FROM hc_gallery WHERE status='active' ORDER BY createddate DESC";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }

    public function getroomlistsclients()
    {
        $result=array();
        $sql="SELECT * FROM hc_rooms WHERE status='active' ORDER BY createddate DESC";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }

    public function getroomlistsclients6()
    {
        $result=array();
        $sql="SELECT * FROM hc_rooms WHERE status='active' ORDER BY createddate DESC limit 6";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }

    public function getimagsliderlistsclient()
    {
        $result=array();
        $sql="select * from hc_sliders where status='active' ORDER by id DESC limit 5";
        $qry=$this->mysqli->query($sql);
        while ($res = $qry->fetch_array(MYSQLI_ASSOC)) {
            $result[]= $res;
        }
        return $result;
    }



}


