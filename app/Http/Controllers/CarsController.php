<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarType;
use App\Imports\CarsImport;
use App\Imports\CarTypeImport;
use Maatwebsite\Excel\Facades\Excel;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function import_page(){
        return view("cars.import");
    }

    public function import_store(Request $request){

        $request->validate([
            'carsfile' => 'required|mimes:xlsx',
        ],[
            'carsfile.required' => 'من فضلك أدخل الملف المطلوب رفعه',
            'carsfile.mimes' => 'الصيغ المسموحة xlsx    ',
            
        ]);

        $file = $request->file('carsfile');

        $importedData = Excel::toArray(new CarsImport, $file)[0];

        try {  
            
            $erros = 0;

            foreach($importedData as $index => $item) {

                foreach(array_keys($item) as $key) {

                    if ($item[$key] == null && !is_integer($key)) {

                        $erros+1;
                        $rowNumber = $index + 2;
                        session()->flash("error","تأكد من صحة البيانات فى سطر رقم $rowNumber الملف");
                        return redirect("/new-car-import");
            
                    }

                }

       
            }

            if ($erros == 0) {

                foreach ($importedData as $item) {
                    Car::create([
                        "Brand" => $item["brand"],
                        "Category" => $item["category"],
                        "ModelName" => $item["modelname"],
                        "ModelType" => $item["modeltype"],
                        "ModelYear" => $item["modelyear"],
                        "Transmission" => $item["transmission"],
                        "TransmissionCount" => $item["transmissioncount"],
                        "FourXFour" => $item["fourxfour"],
                        "PushingType" => $item["pushingtype"],
                        "CC" => $item["cc"],
                        "Cylinder" => $item["cylinder"],
                        "HorsePower" => $item["horsepower"],
                        "FuelType" => $item["fueltype"],
                        "FuelLiter" => $item["fuelliter"],
                        "Tier" => $item["tier"],
                        "Height" => $item["height"],
                        "Width" => $item["width"],
                        "Length" => $item["length"],
                        "Passengers" => $item["passengers"],
                        "PurchasePrice" => $item["purchaseprice"],
                    ]);
                }
               
          }

            session()->flash("message","تم رفع الملف بنجاح");
            return redirect("/new-car-import");

        } catch (\Throwable $th) {

            
            session()->flash("error","تأكد من صحة البيانات فى الملف");
            return redirect("/new-car-import");

       
        }


        
        
      

           
        
    }

    public function index(Request $request)     
    {

        $Data = Car::query();

    
        $CCType = $request->query('CCType');
        $HorsePowerType = $request->query('HorsePowerType');
        $CC = $request->query('CC');
        $HorsePower = $request->query('HorsePower');
        $Category = $request->query('Category');
        $ModelYear = $request->query('ModelYear');
        
        if (isset($CCType) && $CC !== null) {

            if ($CCType == "Greater") {

                $Data->where("CC",">=", $CC);

            } elseif ($CCType == "Lower") {

                $Data->where("CC","<=", $CC);
                
            } elseif ($CCType == "Same") {

                $Data->where("CC","=", $CC);
                
            }
        }

        if (isset($HorsePowerType) && $HorsePower !== null) {

            if ($HorsePowerType == "Greater") {

                $Data->where("HorsePower",">=", $HorsePower);

            } elseif ($HorsePowerType == "Lower") {

                $Data->where("HorsePower","<=", $HorsePower);

            } elseif ($HorsePowerType == "Same") {

                $Data->where("HorsePower","=", $HorsePower);

            }
        }


        if (isset($Category) && $Category !== "الكل") {

           
                $Data->where("Category","=", $Category);

        }

        if (isset($ModelYear) && $ModelYear !== null) {

           
            $Data->where("ModelYear","=", $ModelYear);

        }
        
        $LastData = $Data->paginate(2)->withQueryString();

        return view('cars.view' , ["Data" =>$LastData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        

        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "ModelName" => "required",
            "ModelType" => "required",
            "ModelYear" => "required|numeric",
            "CC" => "required|numeric",
            "HorsePower" => "required|numeric",
            "FuelLiter" => "required|numeric",
            "Height" => "required|numeric",
            "Width" => "required|numeric",
            "Length" => "required|numeric",
            "Tier" => "required|numeric",
            "PurchasePrice" => "required|numeric",
        ],
        [
            "ModelName.required" => "من فضلك أدخل إسم الموديل",
            "ModelType.required" => "من فضلك أدخل نوع الموديل",
            "ModelYear.required" => "من فضلك أدخل سنة الصنع",
            "ModelYear.numeric" => "من فضلك سنة الصنع بالأرقام فقط",
            "CC.required" => "CC من فضلك ادخل الـ",
            "CC.numeric" => " مطلوب بالأرقام فقط CC الـ",
            "HorsePower.required" => "من فضلك أدخل قوة الحصان",
            "HorsePower.numeric" => "قوة الحصان بالأرقام فقط",
            "FuelLiter.required" => "من فضلك أدخل عدد الليترات للتانك",
            "FuelLiter.numeric" => "عدد الليترات للتانك بالأرقام فقط",
            "Height.required" => "من فضلك أدخل طول السيارة",
            "Height.numeric" => "طول السيارة بالأرقام فقط",
            "Width.required" => "من فضلك ادخل عرض السيارة",
            "Width.numeric" => "عرض السيارة بالأرقام فقط",
            "Length.required" => "من فضلك أدخل إرتفاع السيارة",
            "Length.numeric" => "إرتفاع السيارة بالأرقام فقط",
            "Tier.required" => "من فضلك أدخل مقاس الكاوتش",
            "Tier.numeric" => "مقاس الكاوتش بالأرقام فقط",
            "PurchasePrice.required" => "من فضلك ادخل سعر شراء السيارة",
            "PurchasePrice.numeric" => "سعر شراء السيارة بالأرقام فقط",
        ]); 

       $create = Car::create([  
                    "Brand" => $request->Brand,
                    "Category" => $request->Category,
                    "ModelName" => $request->ModelName,
                    "ModelType" => $request->ModelType,
                    "ModelYear" => $request->ModelYear,
                    "Transmission" => $request->Transmission,
                    "TransmissionCount" =>  $request->TransmissionCount,
                    "FourXFour" =>  $request->FourXFour,
                    "PushingType" =>  $request->PushingType,
                    "CC" =>  $request->CC,
                    "Cylinder" =>  $request->Cylinder,
                    "HorsePower" =>  $request->HorsePower,
                    "FuelType" =>  $request->FuelType,
                    "FuelLiter" =>  $request->FuelLiter,
                    "Tier" =>  $request->Tier,
                    "Height" =>  $request->Height,
                    "Width" =>  $request->Width,
                    "Length" =>  $request->Length,
                    "Passengers" =>  $request->Passengers,
                    "PurchasePrice" =>  $request->PurchasePrice,
            ]);

            if ($create) {
                session()->flash("message","تم إضافة السيارة بنجاح");
                return redirect("/new-car");
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
        $carData = Car::where("id",$id)->first();

        if ($carData) {
            return view("cars.edit", ["Data" => $carData]);
        } else {
            return redirect("/cars");
        }

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
        $request->validate([
            "ModelName" => "required",
            "ModelType" => "required",
            "ModelYear" => "required|numeric",
            "CC" => "required|numeric",
            "HorsePower" => "required|numeric",
            "FuelLiter" => "required|numeric",
            "Height" => "required|numeric",
            "Width" => "required|numeric",
            "Length" => "required|numeric",
            "Tier" => "required|numeric",
            "PurchasePrice" => "required|numeric",
        ],
        [
            "ModelName.required" => "من فضلك أدخل إسم الموديل",
            "ModelType.required" => "من فضلك أدخل نوع الموديل",
            "ModelYear.required" => "من فضلك أدخل سنة الصنع",
            "ModelYear.numeric" => "من فضلك سنة الصنع بالأرقام فقط",
            "CC.required" => "CC من فضلك ادخل الـ",
            "CC.numeric" => " مطلوب بالأرقام فقط CC الـ",
            "HorsePower.required" => "من فضلك أدخل قوة الحصان",
            "HorsePower.numeric" => "قوة الحصان بالأرقام فقط",
            "FuelLiter.required" => "من فضلك أدخل عدد الليترات للتانك",
            "FuelLiter.numeric" => "عدد الليترات للتانك بالأرقام فقط",
            "Height.required" => "من فضلك أدخل طول السيارة",
            "Height.numeric" => "طول السيارة بالأرقام فقط",
            "Width.required" => "من فضلك ادخل عرض السيارة",
            "Width.numeric" => "عرض السيارة بالأرقام فقط",
            "Length.required" => "من فضلك أدخل إرتفاع السيارة",
            "Length.numeric" => "إرتفاع السيارة بالأرقام فقط",
            "Tier.required" => "من فضلك أدخل مقاس الكاوتش",
            "Tier.numeric" => "مقاس الكاوتش بالأرقام فقط",
            "PurchasePrice.required" => "من فضلك ادخل سعر شراء السيارة",
            "PurchasePrice.numeric" => "سعر شراء السيارة بالأرقام فقط",
        ]); 

       $update = Car::where("id",$id)->update([  
                    "Brand" => $request->Brand,
                    "Category" => $request->Category,
                    "ModelName" => $request->ModelName,
                    "ModelType" => $request->ModelType,
                    "ModelYear" => $request->ModelYear,
                    "Transmission" => $request->Transmission,
                    "TransmissionCount" =>  $request->TransmissionCount,
                    "FourXFour" =>  $request->FourXFour,
                    "PushingType" =>  $request->PushingType,
                    "CC" =>  $request->CC,
                    "Cylinder" =>  $request->Cylinder,
                    "HorsePower" =>  $request->HorsePower,
                    "FuelType" =>  $request->FuelType,
                    "FuelLiter" =>  $request->FuelLiter,
                    "Tier" =>  $request->Tier,
                    "Height" =>  $request->Height,
                    "Width" =>  $request->Width,
                    "Length" =>  $request->Length,
                    "Passengers" =>  $request->Passengers,
                    "PurchasePrice" =>  $request->PurchasePrice,
            ]);

            if ($update) {
                session()->flash("message","تم تعديل السيارة بنجاح");
                return redirect()->back();
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


      $query =  Car::find($id);

      if ($query) {

        $query->delete();

        session()->flash("message","تم حذف السيارة بنجاح");

        return redirect("/cars");

    } else {

        session()->flash("error","رقم السيارة غير موجود");

        return redirect("/cars");

      }
    }
}
