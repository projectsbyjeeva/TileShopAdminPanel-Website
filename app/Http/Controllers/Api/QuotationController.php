<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuotationMain;
use App\Models\QuotationSub;
use App\Models\QuoteTileLine;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


use DB;

class QuotationController extends Controller
{


public function index(Request $request){

    $data = QuotationMain::where('is_delete',0)
                        ->get();


        return response()->json([
            'status' => true,
            'data' => $data
        ]);
}



public function generateIds()
{
    $yearMonth = date('ym');
    $today = date('ymd');

    // MONTH START + END
    $startDate = now()->startOfMonth()->toDateTimeString();
    $endDate = now()->endOfMonth()->toDateTimeString();

    // GET LAST RECORD FAST
    $lastQuotationId = DB::table('quotation_main')
        ->where('is_delete', 0)
        ->whereBetween('created_at', [$startDate, $endDate])
        ->latest('id')
        ->value('quotation_id');

    // NEXT RUNNING NUMBER
    if ($lastQuotationId) {

        $lastNumber = (int) substr($lastQuotationId, -3);

        $next = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

    } else {

        $next = '001';
    }

    // FINAL QUOTATION NUMBER
    $quotationNo = 'QUOT' . $today . $next;

    // SCREEN ID
    $screenId = 'SRC68' . random_int(10000000, 99999999);

    return response()->json([
        'status' => true,
        'quotation_no' => $quotationNo,
        'screen_id' => $screenId
    ]);
}

// public function generateIds()
// {
//     // TODAY DATE
//     $today = date('ymd');

//     // GET MAX ID (VERY FAST)
//     $lastId = DB::table('quotation_main')
//         ->where()
//         ->max('id');

//     // NEXT NUMBER
//     $next = str_pad(($lastId ?? 0) + 1, 3, '0', STR_PAD_LEFT);

//     // QUOTATION NUMBER
//     $quotationNo = 'QUOT' . $today . $next;

//     // SCREEN ID
//     $screenId = 'SRC68' . random_int(10000000, 99999999);

//     return response()->json([
//         'status' => true,
//         'quotation_no' => $quotationNo,
//         'screen_id' => $screenId
//     ]);
// }


public function addItem(Request $request)
{
       $currentDateTime = Carbon::now('Asia/Kolkata');

        Log::info('currentdate', [
            'time' => $currentDateTime->toDateTimeString()
        ]);

    DB::beginTransaction();

    try {

        if($request->tile_categ == 'Other'){

            $item = QuotationSub::create([
                'unique_id'  => uniqid(),
                 'quotation_id' => $request->quotation_no,
                 'screen_id' => $request->screen_id,
                 'tile_categ'  => $request->tile_categ,
                 'product'   => $request->product,
                 'qty'      =>  $request->qty,
                'rate' => $request->rate,
                'amount' => $request->amount,
                 'entry_date' => $currentDateTime
            ]);
                    DB::commit();

                    Log::info('Item',['item' => $item]);


                    return response()->json([
                        
                        'status' => true,
                        'message' => 'success',
                        'item' => [
                        'id' => $item->id,
                        'unique_id' => $item->unique_id,
                        'tile' => $item->tile_categ,
                        'product' => $item->product,
                        'rate' => $item->rate,
                        'qty' => $item->qty,
                        'amount' => $item->amount,

                        ]
                    ]);
        }

        else{

        

        $item = QuotationSub::create([
             'unique_id'   => uniqid(),
            'quotation_id' => $request->quotation_no,
             'screen_id' => $request->screen_id,
            'tile_categ' => $request->tile,
            'tile_size' => $request->size,
            'design_name' => $request->design,
            'sq_ft' => $request->sqft,
            'rate' => $request->rate,
            'total_box' => $request->box,
            'amount' => $request->amount,
             'width' => $request->width,
              'height' => $request->height,
            'total_amount' => $request->amount,
            'rate_type'  => $request->rateType,  
            'entry_date' => $currentDateTime

        ]);

        $lineData = null;

        if ($request->tile === "Bathroom Tile") {

            $lineData = QuoteTileLine::create([
                'unique_id'   => uniqid(),
                'quotation_id' => $request->quotation_no,
                 'screen_id' => $request->screen_id,
                'design_name' => $request->design,
                'dark_line' => $request->darkLine,
                'light_line' => $request->lightLine,
                'highlight_line' => $request->highlightLine,
                'dark_box' => $request->darkBox,
                'light_box' => $request->lightBox,
                'highlight_box' => $request->highlightBox,
                  'total_box' => $request->box,
                    'width' => $request->width,
              'height' => $request->height,
              'entry_date' => $currentDateTime
            ]);
        }
        else if( $request->tile === "Kitchen Tile"){

         $lineData = QuoteTileLine::create([
                'unique_id'   => uniqid(),
                'quotation_id' => $request->quotation_no,
                 'screen_id' => $request->screen_id,
                'design_name' => $request->design,
                'dark_line' => $request->darkLine,
                'light_line' => $request->lightLine,
                'highlight_line' => $request->highlightLine,
                'dark_box' => $request->darkBox,
                'light_box' => $request->lightBox,
                'highlight_box' => $request->highlightBox,
                  'total_box' => $request->box,
                    'width' => $request->width,
                    'height' => $request->height,
                'entry_date' => $currentDateTime

            ]);
        }

        DB::commit();

        return response()->json([
            'status' => true,
            'item' => [
                'id' => $item->id,
                'tile' => $item->tile_categ,
                'size' => $item->tile_size,
                'design' => $item->design_name,
                'sqft' => $item->sq_ft,
                'rate' => $item->rate,
                'box' => $item->total_box,
                'amount' => $item->amount,

                'darkLine' => $lineData->dark_line ?? null,
                'lightLine' => $lineData->light_line ?? null,
                'highlightLine' => $lineData->highlight_line ?? null,
                'darkBox' => $lineData->dark_box ?? null,
                'lightBox' => $lineData->light_box ?? null,
                'highlightBox' => $lineData->highlight_box ?? null,
                 'tile_line_unique_id' => $lineData->unique_id ?? null,
                               

            ]
        ]);
        }

    } catch (\Exception $e) {
        DB::rollback();

        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ]);
    }
    
}



public function mainSubmit(Request $request)
{
    DB::beginTransaction();

    try {

        Log::info('Main Submit Request Data:', $request->all());

       
        $validated = $request->validate([
            
            'quotation_no' => 'required',
            'screen_id' => 'required',
            'customer' => ' required',
            // 'mobile' => 'required',
            'address' => 'required',
            'total_amount' => 'required'
        ]);

        Log::info('Validated Data:', $validated);

            
        $currentDateTime = Carbon::now();

        Log::info('currentdate', [
            'time' => $currentDateTime->toDateTimeString()
        ]);
       
        $quotation = QuotationMain::Create(
            [
               'unique_id'   => uniqid(),
            'quotation_id' => $request->quotation_no,   
                'screen_id' => $request->screen_id,
                'customer_name' => $request->customer,
                'mobile_no' => $request->mobile,
                'address' => $request->address,
                'total_amount' => $request->total_amount,
                'entry_date'   => $currentDateTime
            ]
        );

        Log::info('Quotation Saved:', $quotation->toArray());

        DB::commit();

        return response()->json([
            'status' => true
        ]);

    } catch (\Exception $e) {

        DB::rollback();

        // 🔥 ERROR LOG
        Log::error('Main Submit Error:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ]);
    }
}


public function  update(Request $request,$id){

  DB::beginTransaction();

  try {

     Log::info('Main Submit Request Data:', $request->all());
  

     $validated =    $request->validate([
            'quotation_no' => 'required',
             'screen_id' => 'required',
            'customer' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'total_amount' => 'required'

        ]);
        Log::info('Validated Data:',$validated);
        
        $quotation = QuotationMain::where('quotation_id',$request->quotation_no)
                            ->where('is_delete',0)
                            ->first();

                            if(!$quotation){
                                return response()->json([
                                    'status' => false,
                                    'message' => 'Quotation Not Found'
                                ]);
                            }
            $quotation->update([
                
                                'customer_name' => $request->customer,
                                'mobile_no' => $request->mobile,
                                'address'  => $request->address,
                                'total_amount' => $request->total_amount,
    
                            ]);
                           
        Log::info('Quotation Updated:' ,$quotation->toArray());
        DB::commit();


        return response()->json([
              'status' => true,
              'message' => 'Successfully Updated'
        ]);


  }
  catch (\Exception $e) {

        DB::rollback();

      
        Log::error('Main Update Error:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ]);
    }
       
}

public function deletesub(Request $request)
{
    try {

      
        $request->validate([
            'id' => 'required',
            'quotation_no' => 'required'
        ]);

       
        $data = QuotationSub::where('id', $request->id)
         ->where('quotation_id', $request->quotation_no)
            ->first();


        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Item not found'
            ]);
        }

        $data->is_delete = 1;
        $data->save();

    Log::info('Quotation Deleted',['id' => $data->id,
            'quotation_no' => $data->quotation_id]);

       
        if(($request->tile == 'Kitchen Tile') || ($request->tile == 'Bathroom Tile'))
{        QuoteTileLine::where('unique_id', $request->tile_line_unique_id)
                ->update(['is_delete' => 1]);

      
}

  return response()->json([
            'status' => true,
            'message' => 'Deleted Successfully'
        ]);


    } catch (\Exception $e) {

        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ]);
    }
}


public function getdata(Request $request,$id){

        $customer = QuotationMain::where('quotation_id',$id)
                                    ->where('is_delete',0)
                                    ->first();
        
        $items = QuotationSub::where('quotation_id',$id)
                                ->where('is_delete',0)
                                ->get();

      foreach ($items as $item) {
    if (($item->tile_categ == 'Bathroom Tile') || ($item->tile_categ == 'Kitchen Tile')) {
        $item->tile_lines = QuoteTileLine::where('quotation_id', $id)
            ->where('is_delete', 0)
            ->where('design_name',$item->design_name)
            ->get();
    }
    else{
        $item->tile_lines = [];
    }
}

        return response()->json([
            'status'  => true,
            'data' => [
                'customer' =>   $customer->customer_name,
                'mobile'  =>$customer->mobile_no,
                'address' => $customer->address,
                'quotation_no' => $customer->quotation_id ?? '',
            'screen_id' => $customer->screen_id ?? '',
             'items'     => $items
                     ]
           
        ]);



}


public function view(Request $request,$id){

        $customer = QuotationMain::where('quotation_id',$id)
                    ->where('is_delete',0)
                    ->first();

        if(!$customer){
            return response()->json([
                'status' => false,
                 'message' => 'Item not found'

            ]);
        }
                    if($customer){

            $subdata = QuotationSub::where('quotation_id',$id)
                                    ->where('is_delete',0)
                                    ->get();

                if($subdata){
                    foreach($subdata as $sub){


                    if (($sub->tile_categ == 'Bathroom Tile') || ($sub->tile_categ == 'Kitchen Tile')) {
        $sub->tile_lines = QuoteTileLine::where('quotation_id', $id)
            ->where('is_delete', 0)
            ->where('design_name',$sub->design_name)
            ->get();
    }
    else{
        $sub->tile_lines = [];
    }

                                Log::info('Error',['linedata' => $sub->tile_lines]);
                                                        // dd($lineData);
                    }

                }

                    }

            return response()->json([
                    'status' => true,
                    'data' => [
                        'customer' => $customer->customer_name,
                        'mobile_no' => $customer->mobile_no,
                         'address' => $customer->address,
                           'entry_date'   => Carbon::parse($customer->entry_date)->format('d-m-Y'),
                           'quotation_no' => $customer->quotation_id ?? '',
            'screen_id' => $customer->screen_id ?? '',
             'items'     => $subdata,
             
                // 'darkLine' => $lineData->dark_line ?? null,
                // 'lightLine' => $lineData->light_line ?? null,
                // 'highlightLine' => $lineData->highlight_line ?? null,
                // 'darkBox' => $lineData->dark_box ?? null,
                // 'lightBox' => $lineData->light_box ?? null,
                // 'highlightBox' => $lineData->highlight_box ?? null,
                //  'tile_line_unique_id' => $lineData->unique_id ?? null,

                    ] 
            ]);
}


public function maindelete(Request $request, $id)
{
    $main = QuotationMain::where('quotation_id', $id)
        ->where('is_delete', 0)
        ->first();

    if (!$main) {
        return response()->json([
            'status' => 'error',
            'message' => 'Quotation not found'
        ], 404);
    }

    $main->is_delete = 1;
    $main->save();

    $updated = QuotationSub::where('quotation_id', $id)
        ->where('is_delete', 0)
        ->update(['is_delete' => 1]);

    $exist = QuoteTileLine::where('quotation_id', $id)
        ->where('is_delete', 0)
        ->exists();

    if($exist == true){
             QuoteTileLine::where('quotation_id', $id)
        ->where('is_delete', 0)
        ->update(['is_delete' => 1]);
    }
    else{

    }
        

    return response()->json([
        'status' => 'success',
        'message' => 'Quotation deleted successfully',
        // 'affected_rows' => $updated
    ]);
}
}
