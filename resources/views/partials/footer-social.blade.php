{{--
    $social => array // [['title','link']]
--}}
<div class="footer-social">
    <div class="row">
        <div class="small-12 text-center columns">
            <ul>
                @foreach($social as $item)
                    <li>
                        <a href="{{ $item['link'] }}" target="_blank" rel="noopener">
                            <span class="icon-{{ strtolower($item['title']) }}"></span><p class="visuallyhidden">{{ $item['title'] }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
