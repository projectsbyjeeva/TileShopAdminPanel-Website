<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\DTOs\TileSublistDTO;
use App\Services\TileSublistService;
use App\Models\QuotationMain;
use App\Models\QuotationSub;
use App\Models\QuoteTileLine;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\DB;


class QuotationController extends Controller
{

// protected $tileSublistService;

// public function _construct(TileSublistService $tileSublistService){

//             $this->tileSublistService = $tileSublistService;
// }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.quotation.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        

         return view('content.quotation.form');
    }

    
    public function store(Request $request)
    {
        
            $request->validate([
                'customer_name' => 'required',
                 'quotation_no' => 'required',
                  'mobile_no' => 'required',
                   'address' => 'required',

 'screen_id' => 'required',
  'total_amount' => 'required',                   ]);

            $data = QuotationMain::create([
                     'unique_id'     => uniqid(),
                     'screen_id' => $request->screen_id,
                     'customer_name' => $request->customer_name,
                     'quotation_no' => $request->quotation_no,
                     'mobile_no' => $request->mobile_no,
                     'address' => $request->address,
                       'total_amount' => $request->total_amount,
            ]);

            return response()->json(['status' => true,'message' => 'Data Inserted']);
    }



 public function sublist(Request $request){
    
 $currentDateTime = Carbon::now('Asia/Kolkata');

        Log::info('currentdate', ['time' => $currentDateTime->toDateTimeString() ]);

    $request->validate([
        'tile_categ' => 'required',
         'tile_size' => 'required',
          'rate' => 'required',
           'sq_ft' => 'required',
            'amount' => 'required',
        'total_box' => 'required'
    ]);

     DB::beginTransaction();


     try{

     


            if(($request->tile_categ == 'Bathroom Tile') ||($request->tile_categ == 'Kitchen Tile')){

            $item = QuotationSub::create([

                'unique_id' => uniqid(),
                 'quotation_id' => $request->quotation_no,
             'screen_id' => $request->screen_id,
            'tile_categ' => $request->tile_categ,
            'tile_size' => $request->tile_size,
            'design_name' => $request->design_name,
            'sq_ft' => $request->sq_ft,
            'rate' => $request->rate,
            'total_box' => $request->total_box,
            'amount' => $request->amount,
             'width' => $request->width,
              'height' => $request->height,
            'total_amount' => $request->amount, 
            'entry_date' => $currentDateTime

            ]);
            }
            
            else if(( $request->tile_categ == 'Wall Tile' ) || ($request->tile_categ == 'Floor Tile')){

              $item = QuotationSub::create([
              'unique_id' => uniqid(),
                 'quotation_id' => $request->quotation_no,
             'screen_id' => $request->screen_id,
            'tile_categ' => $request->tile_categ,
            'tile_size' => $request->tile_size,
            'design_name' => $request->design_name,
            'sq_ft' => $request->sq_ft,
            'rate' => $request->rate,
            'total_box' => $request->total_box,
            'amount' => $request->amount,
            
            'entry_date' => $currentDateTime

              ]);

            }
             
            $lineData  = null;

            if(($request->tile_categ == 'Bathroom Tile') || ($request->tile_categ == 'Kitchen Tile')){

                $lineData = QuoteTileLine::create([
            'unique_id' => uniqid(),
             'quotation_id' => $request->quotation_no,
             'screen_id' => $request->screen_id,
             'design_name'   => $request->design_name,
            'dark_line'  => $request->dark_line,
            'light_line'  => $request->light_line,
            'highlight_line'  => $request->highlighter_line,
            'dark_box'  => $request->dark_box,
            'light_box'  => $request->light_box,
            'highlight_box'  => $request->highlighter_box,
            'total_box'  => $request->total_box,
            'width'  => $request->width,
            'height'  => $request->height,
            'entry_date'  => $currentDateTime

                ]);
            }

              DB::commit();

            return response()->json([
                'status' => true,

            'data'     =>  $item,
            'linedata' =>  $lineData
              
            ]);


    

 }
 catch (\Exception $e){
        DB::rollback();

        return  response()->json([
            'status' => false,
            'message'  => $e->getMessage()
        ]);
 }

 }



 


public function sublist_update(Request $request, $id)
{

    Log::info('SUBLIST UPDATE START');

    Log::info('Update ID : '.$id);

    Log::info('Request Data : ', $request->all());

    $request->validate([

        'tile_categ' => 'required',
        'tile_size'  => 'required',
        'rate'       => 'required',
        'sq_ft'      => 'required',
        'amount'     => 'required',
        'total_box'  => 'required'

    ]);

    Log::info('Validation Completed');

    DB::beginTransaction();

    try{

        Log::info('Transaction Started');

        $data = QuotationSub::where('unique_id', $id)
                            ->where('is_delete', 0)
                            ->first();

        Log::info('QuotationSub Query Executed');

        if(!$data){

            Log::error('No Data Found');

            return response()->json([
                'status'  => false,
                'message' => 'No Data Found'
            ]);
        }

        Log::info('QuotationSub Data Found', [
            'unique_id' => $data->unique_id
        ]);

        
        $lineItem = false;

        Log::info('Finding Line Item');

        if($data){

            $lineItem = QuoteTileLine::where('quotation_id', $request->quotation_no)
                                     ->where('design_name', $data->design_name)
                                     ->where('is_delete', 0)
                                     ->first();

            Log::info('Line Item Query Executed');

               if($lineItem){

            Log::info('Old Line Item Found', [
                'design_name' => $lineItem->design_name
            ]);
        }
        else{

            Log::warning('Old Line Item Not Found');
        }
        }


        // ======================================
        // BATHROOM / KITCHEN UPDATE
        // ======================================

        if(($request->tile_categ == 'Bathroom Tile') || ($request->tile_categ == 'Kitchen Tile')){

            Log::info('Bathroom/Kitchen Update Started');

            $data->update([

                'quotation_id' => $request->quotation_no,
                'screen_id'    => $request->screen_id,
                'tile_categ'   => $request->tile_categ,
                'tile_size'    => $request->tile_size,
                'design_name'  => $request->design_name,
                'sq_ft'        => $request->sq_ft,
                'rate'         => $request->rate,
                'total_box'    => $request->total_box,
                'amount'       => $request->amount,
                'width'        => $request->width,
                'height'       => $request->height,
                'total_amount' => $request->amount,

            ]);

            Log::info('Bathroom/Kitchen QuotationSub Updated');
        }


        // ======================================
        // WALL / FLOOR UPDATE
        // ======================================

        else if(($request->tile_categ == 'Wall Tile') || ($request->tile_categ == 'Floor Tile')){

            Log::info('Wall/Floor Update Started');

            $data->update([

                'tile_categ'  => $request->tile_categ,
                'tile_size'   => $request->tile_size,
                'design_name' => $request->design_name,
                'sq_ft'       => $request->sq_ft,
                'rate'        => $request->rate,
                'total_box'   => $request->total_box,
                'amount'      => $request->amount,

            ]);

            Log::info('Wall/Floor QuotationSub Updated');
        }


        // ======================================
        // GET LINE ITEM
        // ======================================


        if(!$lineItem){

            Log::warning('Line Item Not Found');
        }
        else{

            Log::info('Line Item Found', [
                'design_name' => $lineItem->design_name
            ]);
        }


        // ======================================
        // UPDATE LINE ITEM
        // ======================================

        if(($request->tile_categ == 'Bathroom Tile') || ($request->tile_categ == 'Kitchen Tile')){

            Log::info('Line Item Update Started');

            if($lineItem){

                $lineItem->update([

                    'design_name'    => $request->design_name,
                    'dark_line'      => $request->dark_line,
                    'light_line'     => $request->light_line,
                    'highlight_line' => $request->highlighter_line,
                    'dark_box'       => $request->dark_box,
                    'light_box'      => $request->light_box,
                    'highlight_box'  => $request->highlighter_box,
                    'total_box'      => $request->total_box,
                    'width'          => $request->width,
                    'height'         => $request->height,

                ]);

                Log::info('Line Item Updated Successfully');
            }
        }

        DB::commit();

        Log::info('Transaction Committed');

        Log::info('================ SUBLIST UPDATE SUCCESS ================');

        return response()->json([

            'status'   => true,
            'message'  => 'Updated Successfully',

            'data'     => $data,
            'linedata' => $lineItem

        ]);

    }

    catch(\Exception $e){

        DB::rollback();

        Log::error('================ SUBLIST UPDATE ERROR ================');

        Log::error('Error Message : '.$e->getMessage());

        Log::error('Error Line : '.$e->getLine());

        Log::error('Error File : '.$e->getFile());

        return response()->json([

            'status'  => false,
            'message' => $e->getMessage(),
            'line'    => $e->getLine()

        ]);
    }
}


public function sublist_delete(Request $request)
{

    Log::info('DELETE START');

    DB::beginTransaction();

    try{

        $data = QuotationSub::where('unique_id',$request->unique_id)
                            ->first();

        if(!$data){

            return response()->json([
                'status' => false,
                'message' => 'No Data Found'
            ]);
        }

        Log::info('QuotationSub Found', [
            'id' => $data->id
        ]);

        // ==================================
        // DELETE LINE DATA
        // ==================================

        if(
            $data->tile_categ == 'Bathroom Tile' ||
            $data->tile_categ == 'Kitchen Tile'
        ){

            $lineData = QuoteTileLine::where('quotation_id',$data->quotation_id)
                                     ->where('design_name',$data->design_name)
                                     ->first();

            if($lineData){

                $lineData->is_delete = 1;

                $lineData->save();

                Log::info('LineData Deleted');

            }

        }

        // ==================================
        // DELETE QUOTATION SUB
        // ==================================

        $data->is_delete = 1;

        $save = $data->save();

        Log::info('QuotationSub Save Result', [
            'save' => $save
        ]);

        DB::commit();

        return response()->json([
            'status' => true,
            'message' => 'Deleted Successfully',
            'quotation_id' => $data->quotation_id
        ]);

    }

    catch(\Exception $e){

        DB::rollback();

        Log::error('DELETE ERROR', [
            'message' => $e->getMessage(),
            'line' => $e->getLine()
        ]);

        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ]);

    }

}

 public function sublist_data(Request $request)
{

    Log::info('sublist_data function started', [
        'request_data' => $request->all()
    ]);

    try{

        $datas = QuotationSub::where('quotation_id', $request->unique_id)
                    ->where('is_delete', 0)
                    ->get();

        Log::info('QuotationSub data fetched', [
            'count' => $datas->count(),
            'datas' => $datas
        ]);

        $finalData = [];

        foreach($datas as $data){

            Log::info('Loop started for quotation sub', [
                'unique_id' => $data->unique_id,
                'tile_category' => $data->tile_categ
            ]);

            $lineData = [];

            // ONLY bathroom and kitchen
            if(
                $data->tile_categ == 'Bathroom Tile' ||
                $data->tile_categ == 'Kitchen Tile'
            ){

                Log::info('Bathroom/Kitchen tile detected');

                $lineData = QuoteTileLine::where('quotation_id', $data->quotation_id)
                                ->where('design_name', $data->design_name)
                                ->where('is_delete', 0)
                                ->get();

                Log::info('QuoteTileLine data fetched', [
                    'line_count' => $lineData->count(),
                    'line_data' => $lineData
                ]);

            }

            $finalData[] = [
                'data' => $data,
                'lineData' => $lineData
            ];

        }

        Log::info('Final response prepared', [
            'final_data_count' => count($finalData)
        ]);

        return response()->json([
            'status' => true,
            'datas' => $finalData
        ]);

    }
    catch(\Exception $e){

        Log::error('Error in sublist_data function', [
            'message' => $e->getMessage(),
            'line' => $e->getLine(),
            'file' => $e->getFile()
        ]);

        return response()->json([
            'status' => false,
            'message' => $e->getMessage()
        ]);

    }

}



// public function sublist_data(Request $request)
// {

//     Log::info('sublist_data function started', [
//         'request_data' => $request->all()
//     ]);

//     try{

//         $datas = QuotationSub::where('quotation_id', $request->unique_id)
//                     ->where('is_delete', 0)
//                     ->get();

//         Log::info('QuotationSub data fetched', [
//             'count' => $datas->count()
//         ]);

//         $finalData = [];

//         /*
//         =====================================
//             HTTP POOL REQUESTS
//         =====================================
//         */

//         $responses = Http::pool(function ($pool) use ($datas) {

//             $requests = [];

//             foreach($datas as $data){

//                 if(
//                     $data->tile_categ == 'Bathroom Tile' ||
//                     $data->tile_categ == 'Kitchen Tile'
//                 ){

//                     $requests[$data->unique_id] = $pool->as($data->unique_id)
//                         ->get(url('/tilesublist/data'), [
//                             'quotation_id' => $data->unique_id,
//                             'design_name'  => $data->design_name
//                         ]);

//                 }

//             }

//             return $requests;

//         });

//         /*
//         =====================================
//             FINAL RESPONSE
//         =====================================
//         */

//         foreach($datas as $data){

//             Log::info('Loop started for quotation sub', [
//                 'unique_id' => $data->unique_id,
//                 'tile_category' => $data->tile_categ
//             ]);

//             $lineData = [];

//             if(
//                 $data->tile_categ == 'Bathroom Tile' ||
//                 $data->tile_categ == 'Kitchen Tile'
//             ){

//                 if(isset($responses[$data->unique_id])){

//                     $responseData = $responses[$data->unique_id]->json();

//                     $lineData = $responseData['datas'] ?? [];

//                 }

//             }

//             $finalData[] = [
//                 'data' => $data,
//                 'lineData' => $lineData
//             ];

//         }

//         Log::info('Final response prepared', [
//             'final_data_count' => count($finalData)
//         ]);

//         return response()->json([
//             'status' => true,
//             'datas' => $finalData
//         ]);

//     }
//     catch(\Exception $e){

//         Log::error('Error in sublist_data function', [
//             'message' => $e->getMessage(),
//             'line' => $e->getLine(),
//             'file' => $e->getFile()
//         ]);

//         return response()->json([
//             'status' => false,
//             'message' => $e->getMessage()
//         ]);

//     }

// }



 public function tilesublist_edit(Request $request){

 $data = QuotationSub::where('unique_id',$request->unique_id)
                        ->where('is_delete',0)
                        ->first();

                         $lineData = null;

        if($data && ($data->tile_categ == 'Bathroom Tile') || ($data->tile_categ == 'Kitchen Tile')){
            $lineData = QuoteTileLine::where('quotation_id',$data->quotation_id)
                                      ->where('is_delete',0)
                                      ->where('design_name',$data->design_name)
                                      ->first();

        }
        return response()->json(['status' => true, 'data' => $data ,'lineData' => $lineData]);


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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
