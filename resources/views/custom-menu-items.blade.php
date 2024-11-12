@foreach($items as $item)
  <li
  @if($item->hasChildren())
    class="treeview {{ $item->isActive==1?'active':''}}">
    <a href="#">
      {{-- <i class="fa fa-bars"></i> --}}
      <span>{!! $item->title !!}</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
  @else
    class="{{ $item->isActive==1?'active':''}}">
    <a href="{!! $item->url() !!}">
      {{-- <i class="fa fa-circle-o"></i> --}}
      <span>{!! $item->title !!}</span>
    </a>
  @endif
  @if($item->hasChildren())
    <ul class="treeview-menu">
          @include('custom-menu-items', array('items' => $item->children()))
    </ul>
  @endif
  </li>
@endforeach
