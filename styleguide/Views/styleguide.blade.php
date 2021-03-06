@extends('components.content-area')

@section('content')
    @include('components.page-title', ['title' => $page['title']])

    <div class="content">
        <hr>

        <h2>Two column layout</h2>

        <div class="row -mx-4 md:flex">
            <div class="md:w-1/2 px-4">
                <p>{{ $faker->paragraph }}</p>
            </div>

            <div class="md:w-1/2 px-4">
                <p>{{ $faker->paragraph }}</p>
            </div>
        </div>

        <pre class="bg-grey-lightest overflow-scroll p-4" tabindex="0">
            {!! htmlspecialchars('
<div class="row -mx-4 md:flex">
    <div class="md:w-1/2 px-4">
        <p>'.$faker->paragraph.'</p>
    </div>
    <div class="md:w-1/2 px-4">
        <p>'.$faker->paragraph.'</p>
    </div>
</div>') !!}
        </pre>

        <hr>

        <h2>Three column layout</h2>

        <div class="row -mx-4 lg:flex">
            <div class="lg:w-1/3 px-4">
                <p>{{ $faker->paragraph }}</p>
            </div>

            <div class="lg:w-1/3 px-4">
                <p>{{ $faker->paragraph }}</p>
            </div>

            <div class="lg:w-1/3 px-4">
                <p>{{ $faker->paragraph }}</p>
            </div>
        </div>

        <pre class="bg-grey-lightest overflow-scroll p-4" tabindex="0">
            {!! htmlspecialchars('
<div class="row -mx-4 lg:flex">
    <div class="lg:w-1/3 px-4">
        <p>'.$faker->paragraph.'</p>
    </div>
    <div class="lg:w-1/3 px-4">
        <p>'.$faker->paragraph.'</p>
    </div>
    <div class="lg:w-1/3 px-4">
        <p>'.$faker->paragraph.'</p>
    </div>
</div>') !!}
        </pre>

        <hr>

        <h2>Table</h2>

        <table class="table-stack">
                <caption>Example table with fake contact information</caption>
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>

            <tbody>
                @for ($i = 0; $i < 4; $i++)
                <tr>
                    <td>@image('/styleguide/image/150x50?text=150x50', 'Example table image showing the image size of 150x50', 'p-2')
                    <td>{{ $faker->firstName }}</td>
                    <td>{{ $faker->lastName }}</td>
                    <td><a href="mailto:{{ $faker->email }}">{{ $faker->email }}</a></td>
                </tr>
                @endfor
            </tbody>
        </table>

        <pre class="bg-grey-lightest overflow-scroll p-4" tabindex="0">
        {!! htmlspecialchars('
<table class="table-stack">
        <caption>Example table with caption</caption>
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>') !!}
        </pre>

        <hr>

        <h2>Abbreviations</h2>

        <p><abbr title="Wayne State University">WSU</abbr></p>

        <hr>

        <div class="row -mx-4 md:flex">
            <div class="w-full md:w-1/3 px-4">
                <h2>Unordered lists</h2>

                <ul>
                    <li>First</li>
                    <li>Second</li>
                    <li>Third</li>
                </ul>
            </div>

            <div class="w-full md:w-1/3 px-4">
                <h2>Ordered lists</h2>

                <ol>
                    <li>First</li>
                    <li>Second</li>
                    <li>Third</li>
                </ol>
            </div>

            <div class="w-full md:w-1/3 px-4">
                <h2>Data lists</h2>

                <dl>
                    <dt>First</dt>
                    <dd>Description of first.</dd>
                    <dt>Second</dt>
                    <dd>Description of second.</dd>
                    <dt>Third</dt>
                    <dd>Description of third.</dd>
                </dl>
            </div>
        </div>

        <hr>

        <h2>Blockquote</h2>

        <blockquote>
            <p>{{ $faker->paragraph(10) }}</p>
        </blockquote>


        <pre class="bg-grey-lightest overflow-scroll p-4" tabindex="0">
        {!! htmlspecialchars('
<blockquote>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</blockquote>') !!}
        </pre>

        <hr>

        <h2>PDF links</h2>

        Links to PDFs will automatically append the file type to the end of the link. Example: <a href="example.pdf">download brochure</a>.

        <hr>

        <h2>Buttons</h2>

        <a href="#button-examples" class="button">Standard button</a>
        <br />
        <a href="#button-examples" class="button bg-gradient-green text-white">Dark button</a>
        <a href="#button-examples" class="button expanded">Expanded button</a>
        <br />

        <pre class="bg-grey-lightest overflow-scroll p-4" tabindex="0">
        {!! htmlspecialchars('
<a href="#" class="button">Standard button</a>
<a href="#" class="button bg-gradient-green text-white">Dark button</a>
<a href="#" class="button expanded">Expanded button</a>') !!}
        </pre>

        <hr>

        <h2>Headers</h2>

        <h1>H1: {{ $faker->sentence }}</h1>
        <h2>H2: {{ $faker->sentence }}</h2>
        <h3>H3: {{ $faker->sentence }}</h3>
        <h4>H4: {{ $faker->sentence }}</h4>
        <h5>H5: {{ $faker->sentence }}</h5>
        <h6>H6: {{ $faker->sentence }}</h6>

        <hr>

        <h2>Media</h2>
        <p>Any valid YouTube URL starting with <code class="bg-grey-lightest py-px pb-1 px-1 text-sm">youtu.be</code> or <code class="bg-grey-lightest py-px pb-1 px-1 text-sm">youtube.com/watch</code> will open a lightbox with the video.</p>
        <p><a href="//www.youtube.com/watch?v=guRgefesPXE"><img src="//i.wayne.edu/youtube/guRgefesPXE" alt="School of Medicine Commencement YouTube video"></a></p>

        <pre class="bg-grey-lightest overflow-scroll p-4" tabindex="0">
        {!! htmlspecialchars('
<p>
    <a href="//www.youtube.com/watch?v=guRgefesPXE">
        <img src="//i.wayne.edu/youtube/guRgefesPXE" alt="Description of YouTube video">
    </a>
</p>') !!}
        </pre>

        <hr>

        <h2>Responsive Embed</h2>

        <p>To make sure embedded content maintains its aspect ratio as the width of the screen changes, wrap the <code class="bg-grey-lightest py-px pb-1 px-1 text-sm">iframe</code>, <code class="bg-grey-lightest py-px pb-1 px-1 text-sm">object</code>, <code class="bg-grey-lightest py-px pb-1 px-1 text-sm">embed</code>, or <code class="bg-grey-lightest py-px pb-1 px-1 text-sm">video</code> in a container with the <code class="bg-grey-lightest py-px pb-1 px-1 text-sm">.responsive-embed</code> class.</p>
        <div class="responsive-embed">
            <iframe width="420" height="315" src="//www.youtube.com/embed/guRgefesPXE" title="Responsive embed example" allowfullscreen></iframe>
        </div>

        <pre class="bg-grey-lightest overflow-scroll p-4" tabindex="0">
        {!! htmlspecialchars('
<div class="responsive-embed">
    <iframe width="420" height="315" src="//www.youtube.com/embed/guRgefesPXE" title="Responsive embed example" allowfullscreen></iframe>
</div>') !!}
        </pre>

        <hr>

        <div class="row flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <h2>Figure</h2>

                <div class="table">
                    <figure>
                        @image('/styleguide/image/400x300', 'Example figure image showing the image size of 400x300', 'p-2')
                        <figcaption>{{ $faker->sentence }}</figcaption>
                    </figure>
                </div>

                <pre class="bg-grey-lightest overflow-scroll p-4" tabindex="0">
                {!! htmlspecialchars('
<figure>
    <img src="/styleguide/image/400x300" alt="">
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</figcaption>
</figure>') !!}
                </pre>

                <a href="/styleguide/figure" class="button mt-4">More options</a>
            </div>
        </div>

        <hr>

        <h2 class="pb-6">Colors</h2>

        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                <div class="rounded overflow-hidden border border-grey">
                    <div class="text-black bg-green-lightest px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Lightest green</span>
                    </div>
                    <div class="text-black bg-green-lighter px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Lighter green</span>
                    </div>
                    <div class="text-white bg-green-light px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Light green</span>
                    </div>
                    <div class="text-white bg-green px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Base green</span>
                    </div>
                    <div class="text-white bg-green-dark px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Dark green</span>
                    </div>
                    <div class="text-white bg-green-darker px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Darker green</span>
                    </div>
                    <div class="text-white bg-green-darkest px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Darkest green</span>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                <div class="rounded overflow-hidden border border-grey">
                    <div class="text-black bg-yellow-lightest px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Lightest yellow</span>
                    </div>
                    <div class="text-black bg-yellow-lighter px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Lighter yellow</span>
                    </div>
                    <div class="text-black bg-yellow-light px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Light yellow</span>
                    </div>
                    <div class="text-black bg-yellow px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Base yellow</span>
                    </div>
                    <div class="text-black bg-yellow-dark px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Dark yellow</span>
                    </div>
                    <div class="text-black bg-yellow-darker px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Darker yellow</span>
                    </div>
                    <div class="text-white bg-yellow-darkest px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Darkest yellow</span>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8">
                <div class="rounded overflow-hidden border border-grey">
                    <div class="text-black bg-white px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>White</span>
                    </div>
                    <div class="text-black bg-grey-lightest px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Lightest grey</span>
                    </div>
                    <div class="text-black bg-grey-lighter px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Lighter grey</span>
                    </div>
                    <div class="text-black bg-grey-light px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Light grey</span>
                    </div>
                    <div class="text-black bg-grey px-6 py-3 text-sm font-semibold flex justify-between flex justify-between">
                        <span>Base grey</span>
                    </div>
                    <div class="text-black bg-grey-dark px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Dark grey</span>
                    </div>
                    <div class="text-white bg-grey-darker px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Darker grey</span>
                    </div>
                    <div class="text-white bg-grey-darkest px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Darkest grey</span>
                    </div>
                    <div class="text-white bg-black px-6 py-3 text-sm font-semibold flex justify-between">
                        <span>Black</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
