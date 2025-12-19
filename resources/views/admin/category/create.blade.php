<x-app-layout>
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <h4> Create Category</h4>
                    <a href="{{ route('admin.category.index') }}" class="btn  btn-primary ">Go Back</a>
                  </div>
                  <div class="card-body">

                    <form action="{{ route('admin.category.store') }}" method="post">
                      @csrf

                      <div class="row">
                        <div class="mb-2 col-6">
                          <label for="title">Title <span class="text-danger">*</span></label>
                          <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                          @error('title')
                          <span class="text-danger">{{ $message }}</span>
                            
                          @enderror
                        </div>

                        
                         <div class="mb-2 col-6">
                          <label for="position">Position <span class="text-danger">*</span></label>
                          <input type="number" name="position" id="position" class="form-control" value="{{ old('position') ?? $position }}">
                          @error('position')
                          <span class="text-danger">{{ $message }}</span>
                            
                          @enderror
                        </div>

                        <div class="mb-2 col-12">
                          <label for="meta_keywords">Meta Keywords</label>
                          <textarea name="meta_keywords" id="meta_keywords" class="form-control"></textarea>
                        </div>

                        <div class="mb-2 col-12">
                          <label for="meta_description">Meta Description</label>
                          <textarea name="meta_description" id="meta_description" class="form-control"></textarea>
                        </div>

                        <div class="mb-2 col-6">
                            <label for="visible">Visible <span class="text-danger">*</span></label>
                            <select name="visible" id="visible" class="form-control">
                            <option value="1" selected>Yes</option>
                            <option value="0">No</option>
                        </select>
                        @error('visible')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                      </div class="col-12">
                      <button type="submit" class="btn btn-success">Save Record</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

</x-app-layout>    