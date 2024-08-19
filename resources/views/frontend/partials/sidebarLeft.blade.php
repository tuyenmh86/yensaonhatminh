    @foreach(App\Category::where('id',73)->get() as $category)
        @foreach($category->subcategories as $subcategory)
            <div class="box_left">
                <h2 class="title-left">
                    <a href="{{$subcategory->link()}}" title="{{$subcategory->name}}"><i class="fa fa-bullseye" aria-hidden="true"></i> {{$subcategory->name}}</a>
                </h2>
                <ul>
                    @foreach($subcategory->subsubcategories as $subsubcategory)
                        <li><h3 class="title_h3 transition"><a href="{{$subsubcategory->link()}}" title="{{$subsubcategory->name}}"><i class="fa fa-angle-right" aria-hidden="true"></i> {{$subsubcategory->name}}</a></h3></li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    @endforeach
