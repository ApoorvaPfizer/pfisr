@include('layouts.header')
<style>
    table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
<main>
  <div class="container py-4">

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
      <form method="POST" action="{{ route('url.search') }}">
                @csrf
                <div class="mb-3">
                    <label for="destination_url" :value="__('Long URL:')">URL</label>
                    <input id="destination_url" class="text-input" type="text" name="destination_url"
                        value="{{ request()->destination_url }}" />                   
                </div>

                <div class="mb-3">
                    <label for="short_code" :value="__('Short URL:')">Short url</label>
                    <input id="short_code" class="text-input" type="text" name="short_code"
                        :value="old('short_code', request()->short_code)" />
                </div>

                <div class="mb-3">
                    <label for="brand" :value="__('Brand:')">Brand</label>
                    <input id="brand" class="text-input" type="text" name="short_code"
                        :value="old('brand', request()->brand)" />
                </div>

                <div class="">
                    <button class="mt-4">
                        {{ __('Apply') }}
                    </button>
                </div>

            </form>
<table>
  
      @foreach ($url as $post)
      <tr>        
        <td>{{ $post->url }}<br> <a href="http://127.0.0.1:8000/{{$post->short_url }}">http://127.0.0.1:8000/{{$post->short_url }}</a></td>
        <td>{{ $post->optional_alias }}</td>
        <td>{{ $post->exipration_date }}</td>
        <td>{{ $post->link_redirection }}</td>
        <td>{{ $post->group_name }}</td>
        <td>{{ $post->brand }}</td> 
     
        <td> <a href="{{ route('url.edit', $post->id) }}"
        class="btn btn-primary btn-sm">Edit</a>
        <form action="{{ route('url.destroy', $post->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      <a class="btn btn-primary btn-sm" href="/url/{{$post->id}}/generate-qrcode">Get QR code</a>
        </td>
      </tr>
    @endforeach
</table>
    </div>
    </div>
  </div>
</main>
 
 
  @include('layouts.footer')

