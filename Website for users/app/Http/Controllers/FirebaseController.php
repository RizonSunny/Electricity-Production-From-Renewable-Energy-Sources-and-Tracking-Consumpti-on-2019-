<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{

  private $month;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-9d875-firebase-adminsdk-wltre-a1b8486a6c.json');
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-208ac-firebase-adminsdk-gaogq-2ab20312e6.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://laravelfirebase-208ac.firebaseio.com/')
        ->create();
        $database = $firebase->getDatabase();


        //  $newPost = $database
        //  ->getReference('blog/')
        //  ->push([
        //  'title' => 'Laravel FireBase Tutorial' ,
        //  'category' => 'Laravel'
        //  ]);
        // echo '<pre>';
        // print_r($newPost->getvalue());

        $newdata = $database
        ->getReference('blog/test')
        ->getvalue();

      //  dd($newdata);
        //
        foreach ($newdata as $value) {

          //print_r($value['title']);
          echo ("title= ");
          echo($value);

        //  printf("f\r\nd");
          echo "<br>";
          echo "Category= ";
        //  echo($value['category']);
          echo "<br>";
        }

      //   newdata.foreach(function(newdata) {
      // var val = newdata.val();
      // print_r( val.title);
      // print_r( val.category);



      }

      public function Add_data()
      {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-208ac-firebase-adminsdk-gaogq-2ab20312e6.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://laravelfirebase-208ac.firebaseio.com/')
        ->create();
        $database = $firebase->getDatabase();


         $newPost = $database
         ->getReference('blog/graph/production')
         ->push([
         'X' => 'Laravel FireBase Tutorial' ,
         'Y' => 'Laravel'
         ]);
         $result=null;
        // return view ('test',['emps'=>$result]);
      }

      public function See_data()
      {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-208ac-firebase-adminsdk-gaogq-2ab20312e6.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://laravelfirebase-208ac.firebaseio.com/')
        ->create();
        $database = $firebase->getDatabase();

        $newdata = $database
        ->getReference('blog/test')
        ->getvalue();

        //return view('test');
        $result=null;
        return view('test',['emps'=>$newdata]);

      }

      public function Solar_data_see()
      {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-208ac-firebase-adminsdk-gaogq-2ab20312e6.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://laravelfirebase-208ac.firebaseio.com/')
        ->create();
        $database = $firebase->getDatabase();

        $newdata = $database
        ->getReference('blog/solar')
        ->getvalue();

        return view('solardata',['emps'=>$newdata]);
      }

      public function Solar_data_add()
      {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-208ac-firebase-adminsdk-gaogq-2ab20312e6.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://laravelfirebase-208ac.firebaseio.com/')
        ->create();
        $database = $firebase->getDatabase();


         $newPost = $database
         ->getReference('blog/solar')
         ->push([
         'title' => 'Laravel FireBase Tutorial' ,
         'category' => 'Laravel'
         ]);
         $result=null;
         return view ('solardata',['emps'=>$result]);
      }



      public function consumption_data()
      {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-208ac-firebase-adminsdk-gaogq-2ab20312e6.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://laravelfirebase-208ac.firebaseio.com/')
        ->create();
        $database = $firebase->getDatabase();

        $flat1 = $database
       ->getReference('ConsumeData/Device1/month')
       ->getvalue();

       $flat2 = $database
        ->getReference('ConsumeData/Device2/month')
       ->getvalue();

       $flat3 = $database
       ->getReference('ConsumeData/Device3/month')
       ->getvalue();


       $warning = $database
       ->getReference('ConsumeData/Limit')
       ->getvalue();



       $f1 = $database
       ->getReference('ConsumeData/Device1/Energy')
       ->getvalue();


       $f2 = $database
       ->getReference('ConsumeData/Device2/Energy')
       ->getvalue();


       $f3 = $database
       ->getReference('ConsumeData/Device3/Energy')
       ->getvalue();


    //  $database->getReference('ConsumeData/Device1/month/0919')->set($f1);
    //  $database->getReference('ConsumeData/Device2/month/0919')->set($f2);
    //  $database->getReference('ConsumeData/Device3/month/0919')->set($f3);



      // $flat1 = [12];
      // $flat2 = [12];
      // $flat3 = [14];
      //$flat1= json_decode($flat1);
      //return $flat2;

          $flat1_array= array();

          $month_array=["Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dec"];
          $sum_flat=array();

          $month=1;


          foreach($flat1 as $data)
          {
            array_push($flat1_array,$data);
          }
          $flat2_array= array();
          foreach($flat2 as $data)
          {
            array_push($flat2_array,$data);
          }
          $flat3_array= array();
          foreach($flat3 as $data)
          {
            array_push($flat3_array,$data);
          }

          $flat1['1019']=$f1;
          $flat2['1019']=$f2;
          $flat3['1019']=$f3;

        //  print_r($month_array);
        //  print_r($flat1_array);
        //  print_r($flat2_array);

        return view('consumption_data',['one'=>$flat1],['two'=>$flat2])->with('three',$flat3)->with('warning',$warning);
        //return view('consumption_data_next',['one'=>$flat1],['two'=>$flat2])->with('three',$flat3)->with('month',$month_array);

      }

      public function production_state()
      {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-208ac-firebase-adminsdk-gaogq-2ab20312e6.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://laravelfirebase-208ac.firebaseio.com/')
        ->create();
        $database = $firebase->getDatabase();

        $solar = $database
       ->getReference('Production/Solar')
        ->getvalue();

        return view('final/production_rate',['Solar'=>$solar]);
      }

      public function flat1()
      {
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-208ac-firebase-adminsdk-gaogq-2ab20312e6.json');
            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://laravelfirebase-208ac.firebaseio.com/')
            ->create();
            $database = $firebase->getDatabase();

            $flat1 = $database
           ->getReference('ConsumeData/Device1/month')
            ->getvalue();

            $month_array=["Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dec"];

            return view('final/flat1',['allmonth'=>$flat1],['monthname'=>$month_array]);
      }

      public function flat2()
      {
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-208ac-firebase-adminsdk-gaogq-2ab20312e6.json');
            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://laravelfirebase-208ac.firebaseio.com/')
            ->create();
            $database = $firebase->getDatabase();

            $flat2 = $database
           ->getReference('ConsumeData/Device2/month')
            ->getvalue();

            $month_array=["Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dec"];

            return view('final/flat2',['allmonth'=>$flat2],['monthname'=>$month_array]);
      }

      public function flat3()
      {
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/laravelfirebase-208ac-firebase-adminsdk-gaogq-2ab20312e6.json');
            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://laravelfirebase-208ac.firebaseio.com/')
            ->create();
            $database = $firebase->getDatabase();

            $flat3 = $database
           ->getReference('ConsumeData/Device3/month')
            ->getvalue();

            $month_array=["Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dec"];

            return view('final/flat3',['allmonth'=>$flat3],['monthname'=>$month_array]);
      }

  }
