{{--
    $social => array // [['title','link']]
--}}
<div class="bg-green-darker pt-6 pb-4">
    <ul class="row list-reset text-center">
        @foreach($social as $item)
            <li class="inline{{ $loop->last !== true ? ' mr-8' : '' }}">
                <a href="{{ $item['link'] }}" target="_blank" rel="noopener" class="inline-block pt-1 text-white fill-current table-cell align-middle h-14 w-14 bg-green-light rounded-full transition transition-property-bg transition-delay-none hover:bg-green-lighter hover:text-white">
                    @svg($item['title'])
                </a>
            </li>
        @endforeach
    </ul>
</div>
