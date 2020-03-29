@php
    /** @var \App\Models\BlogCategory $item */
   /** @var \Illuminate\Support\Collection  $categoryList */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card_title"></div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active">Основные настройки</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" value="{{$item->title}}"
                                   id="title" class="form-control" min="3" required>


                        </div>
                        <div class="form-group">
                            <label for="slug">Индификатор</label>
                            <input type="text" name="slug" value="{{$item->slug}}"
                                   id="slug" class="form-control">


                        </div>
                        <div class="parent_id form-group">
                            <label for="title">Родитель</label>
                            <select type="text" name="parent_id" value="{{$item->slug}}"
                                    id="parent_id" class="form-control" placeholder="Выберите категорию" required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id == $item->parent_id) selected @endif>
{{--                                        {{$categoryOption->id}}. {{$categoryOption->title}}--}}
                                        {{$categoryOption->id_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control" id="description" rows="3" name="description">
                                {{ old('description', $item->description)}}
                            </textarea>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>





