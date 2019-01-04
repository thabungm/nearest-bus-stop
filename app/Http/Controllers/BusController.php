<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BusStopRepository;
use App\Repositories\BusesRepository;
use App\Repositories\BusStopHasBusesRepository;
use App\Http\Requests\BusRequest;

class BusController extends Controller
{

    private $busRepository;
    private $busStopRepository;
    private $busStopHasBusesRepository;
    
    public function __construct(BusStopRepository $busStopRepository, BusesRepository $busRepository, BusStopHasBusesRepository $busStopHasBusesRepository)
    {
        $this->busStopRepository = $busStopRepository;
        $this->busRepository = $busRepository;
        $this->busStopHasBusesRepository = $busStopHasBusesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->busRepository->all();
        return view('backend.bus.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $busStops = $this->busStopRepository->all();
        return view('backend.bus.create',compact('busStops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusRequest $request)
    {
    
        \DB::beginTransaction();
        try {
            $input = $request->except('bus_stop');
            $data = $this->busRepository->create($input);
            $busStopHasBuses = [
                            'bus_id' => $data->id,
                            'bus_stop_id' =>$request->bus_stop        
                        ];
            $data = $this->busStopHasBusesRepository->create($busStopHasBuses);
            \DB::commit();
            return $this->index();
        } catch (ValidatorException $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessageBag(),
            ]);
        } catch (\Exception $e) {
            \DB::rollback();
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
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
        $data = $this->busRepository->find($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $busStops = $this->busStopRepository->all();
        $data = $this->busRepository->find($id);
        return view('backend.bus.edit',compact('data','busStops'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BusRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BusRequest $request, $id)
    {
        $input = $request->all();
        $data = $this->busRepository->update($input, $id);
        return $this->index();
    }
}
