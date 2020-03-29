@php
    /** @var \App\Models\BlogPost $item */

@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card_title"></div>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active">
                            @if($item->is_published)
                                Опубликованно
                            @else
                                Черновик
                            @endif
                        </a>
                    </li>
                </ul>
                <br>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#description">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#characteristics">Дополнительные</a>
                    </li>

                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="form-group">
                                    <label for="title">Заголовок</label>
                                    <input type="text" name="title" value="{{$item->title}}"
                                           id="title" class="form-control" min="3" required>
                                </div>

                                <div class="form-group">
                                    <label for="content_raw">Описание</label>
                                    <textarea class="form-control" id="content_raw" rows="8" name="content_raw">
                                {{ old('content_raw', $item->content_raw)}}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="characteristics">
                        <div class="form-group">
                            <label for="slug">Индификатор</label>
                            <input type="text" name="slug" value="{{$item->slug}}"
                                   id="slug" class="form-control">
                        </div>
                        <div class="parent_id form-group">
                            <label for="title">Категория</label>
                            <select type="text" name="category_id" value="{{$item->category_id}}"
                                    id="category_id" class="form-control" placeholder="Выберите категорию" required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"
                                            @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{--                                        {{$categoryOption->id}}. {{$categoryOption->title}}--}}
                                        {{$categoryOption->id_title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Краткое описание</label>
                            <textarea class="form-control" id="excerpt" rows="2" name="description">
                                {{ old('excerpt', $item->excerpt)}}
                                    </textarea>
                        </div>
                    </div>

                </div>

                <div class="form_check">
                    <input type="hidden" name="is_published" value="0">

                    <input type="checkbox"
                           name="is_published"
                           class="form-check-input"
                           value="1"
                           @if ($item->is_published)
                           checked="checked"
                           @endif
                    >
                    <label for="is_published" class="form-check-label">Опубликованно</label>

                </div>


            </div>
        </div>
    </div>

</div>





