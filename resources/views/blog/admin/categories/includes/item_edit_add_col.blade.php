@php
    /** @var \App\Models\BlogCategory $item */
   /** @var \Illuminate\Support\Collection  $categoryList */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="cardrd">
            <div class="card-body">
               <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>
@if($item->exists)
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="cardrd">
           <div class="card-body">
               <ul class="list-body">
                   <li>
                       ID: {{$item->id}}
                   </li>

               </ul>
           </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="cardrd">
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Созданно</label>
                    <input type="text" class="form-control" value="{{$item->created_at}}" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Измененно</label>
                    <input type="text" class="form-control" value="{{$item->updated_at}}" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Удаленно</label>
                    <input type="text" class="form-control" value="{{$item->deleted_at}}" disabled>
                </div>
            </div>
        </div>
    </div>
</div>


@endif
