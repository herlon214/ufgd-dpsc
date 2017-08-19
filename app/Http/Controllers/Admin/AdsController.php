<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Forms\Admin\Ads;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Requests;

class AdsController extends \App\Http\Controllers\Controller {
    
    public function construct() {
      $this->middleware('auth');
    }
    
    public function index() {
        $items = \App\Models\Ads::orderBy('slot', 'ASC')->with('Hits')->get();

        return view('admin.ads.index', ['items' => $items]);
    }

    public function create() {
      $form = \FormBuilder::create(Ads::class, [
          'method' => 'POST',
          'url' => action('Admin\AdsController@store')
      ]);

      return view('admin.ads.create', ['form' => $form]);
    }

    public function store(Request $request) {
      $item = new \App\Models\Ads();
      $form = \FormBuilder::create(Ads::class);
      
      if (!$form->isValid()) {
          return redirect()->back()->withErrors($form->getErrors())->withInput();
      }

      $values = $form->getFieldValues();
      $item = $this->parseValues($values, $item, $request);

      $item->save();

      \App\Flash::callout('success','Publicidade salva com sucesso!', $request);
      return redirect(action('Admin\AdsController@index')); 
    }

    public function show($id) {
        $item = \App\Models\Ads::find($id);
        $labels;
        $data;

        // build the querys
        for($i = 0; $i < 60; $i++) {
          $date_start = new \DateTime();
          $date_start = $date_start->modify('-'.($i+1).' minutes');
          $date_end = new \DateTime();
          $date_end = $date_end->modify('-'.$i.' minutes');
          $query = \App\Models\AdsHit::where('created_at', '>=', $date_start->format('Y-m-d H:i:s'))
            ->where('created_at', '<=', $date_end->format('Y-m-d H:i:s'))
            ->where('ad_id', '=', $id)
            ->count();
          $labels[] = $date_start->format('H:i') . ' até ' . $date_end->format('H:i');
          $data[] = $query;
        }

        return view('admin.ads.show', ['item' => $item, 'labels' => implode($labels, "','"), 'data' => implode($data, ',')]);
    }

    public function edit($id, Request $request) {
        $item = \App\Models\Ads::find($id);
        $form = \FormBuilder::create(Ads::class, [
            'method' => 'PUT',
            'model' => $item,
            'url' => action('Admin\AdsController@update', $id)
        ]);

        return view('admin.ads.edit', ['item' => $item,'form' => $form]);
    }

    public function update($id, Request $request) {
        $item = \App\Models\Ads::find($id);
        $form = \FormBuilder::create(Ads::class);
        
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $values = $form->getFieldValues();
        $item = $this->parseValues($values, $item, $request);

        $item->save();

        \App\Flash::callout('success','Publicidade editada com sucesso!', $request);
        return redirect()->back(); 
    }

    public function destroy ($id, Request $request) {
        $comment = \App\Models\Ads::find($id);

        $comment->delete();

        \App\Flash::callout('success','Publicidade deletada com sucesso!', $request);
        return redirect()->back(); 
    }

    private function parseValues($values, $item, $request) {
      $item->url = $values['url'];
      $item->slot = $values['slot'];
      $item->start_date = $values['start_date'];
      $item->end_date = $values['end_date'];

      if ($request->hasFile('image_url')) {
        $file = $request->file('image_url');
        $item->image_url = $file->move('ads', sha1(time()).'.'.$file->extension());
      }

      return $item;
    }
}