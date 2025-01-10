<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

<body>
<div class="container py-4">
  <div class="p-5 mb-4 bg-light rounded-3">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Edit URL</h3>
      <form action="{{ route('url.update', $url->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="url">Paste your long URL here</label>
          <input type="text" class="form-control" id="url" name="url" value="{{ $url->url }}" required>
        </div>
        <div class="heading">Enter a custom alias(optional)</div>
        <div class="form-group">
          <label for="optional_alias">https://www.pfi.sr/</label>
          <input type="text" class="form-control" id="optional_alias" value="{{ $url->optional_alias }}" name="optional_alias">
        </div>
        <div class="form-group">
          <label for="exipration_date">Expiration date</label>
          <input type="date" class="form-control" id="exipration_date" name="exipration_date"  value="{{ $url->exipration_date }}">
        </div>
        <div class="form-group">
          <label for="link_redirection">Expired link redirection</label>
          <input type="text" class="form-control" id="link_redirection" name="link_redirection" value="{{ $url->link_redirection }}">
        </div>
        <div class="form-group">
          <label for="group_name">Group name<label>
          <select class="form-select" id="group_name" name="group_name" value="{{ $url->group_name }}">
          <option value="">Select a group</option>        
          <option value="group_1">
              Group 1
          </option>
          <option value="group_2">
              Group 2
          </option>      
        </select>
        </div>
        <div class="form-group">
          <label for="brand">Select brand</label>
          <input type="text" class="form-control" id="brand" name="brand" value="{{ $url->brand }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>
  </div>
</div>
</body>
@include('layouts.footer')

</html>