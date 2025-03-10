@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('user.store') }}" method="POST" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>- Nhập thông tin chung của người sử dụng</p>
                        <p>- Lưu ý: Những trường dánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Email
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        class="form-control" 
                                        placeholder="" 
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Họ Tên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                        type="text" 
                                        name="name" 
                                        value="{{ old('name') }}" 
                                        class="form-control" 
                                        placeholder="" 
                                        autocomplete="off"
                                    >     
                                </div>
                            </div>                       
                        </div>
                        @php
                         $userCategory = [
                            '[Chọn nhóm thành viên]',
                            'Quản trị viên',
                            'Cộng tác viên'
                         ]   
                        @endphp
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhóm thành viên
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <select name="user_category_id" id="" class="form-control setupSelect2">
                                       @foreach ($userCategory as $key => $item)
                                       <option @selected((int) old('user_category_id') === (int) $key) value="{{ $key }}">{{ $item }}</option>
                                       @endforeach        
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ngày sinh</label>
                                    <input 
                                        type="date" 
                                        name="birthday" 
                                        value="{{ old('birthday') }}" 
                                        class="form-control" 
                                        placeholder="" 
                                        autocomplete="off"
                                    >     
                                </div>
                            </div>                       
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Mật khẩu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                        type="password" 
                                        name="password" 
                                        value="" 
                                        class="form-control" 
                                        placeholder="" 
                                        autocomplete="off"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Nhập lại mật khẩu
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input 
                                        type="password" 
                                        name="re_password" 
                                        value="" 
                                        class="form-control" 
                                        placeholder="" 
                                        autocomplete="off"
                                    >     
                                </div>
                            </div>                       
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ảnh đại diện</label>
                                    <input 
                                        type="text" 
                                        name="iamge" 
                                        value="{{ old('iamge') }}" 
                                        class="form-control input-image" 
                                        placeholder="" 
                                        autocomplete="off"
                                        data-upload="Images"
                                    >
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin liên hệ</div>
                    <div class="panel-description">Nhập thông tin liên hệ của người sử dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                   <label for="" class="control-label text-left">Thành phố</label>
                                   <select name="province_id" class="form-control setupSelect2 province location" data-target="districts">
                                    <option value="0">[Chọn Thành Phố]</option>
                                    @isset($provinces)
                                        @foreach ($provinces as $province)
                                        <option @selected((int) old('province_id') === (int) $province->code)
                                        value="{{ $province->code }}">{{ $province->name }}</option>
                                        @endforeach
                                    @endisset
                                   </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Quận/Huyện</label>
                                    <select name="district_id" class="form-control setupSelect2 districts location" data-target="wards">
                                        <option value="0">[Chọn Quận/Huyện]</option>
                                    </select> 
                                </div>
                            </div>                       
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                   <label for="" class="control-label text-left">Phường/Xã</label>
                                   <select name="ward_id" class="form-control setupSelect2 wards">
                                    <option value="0">[Chọn Phường/Xã]</option>
                                   </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Địa chỉ</label>
                                    <input 
                                    type="text" 
                                    name="address" 
                                    value="{{ old('address') }}" 
                                    class="form-control" 
                                    placeholder="" 
                                    autocomplete="off"
                                    >
                                </div>
                            </div>                       
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                   <label for="" class="control-label text-left">Số điện thoại</label>
                                   <input 
                                   type="text" 
                                   name="phone" 
                                   value="{{ old('phone') }}" 
                                   class="form-control" 
                                   placeholder="" 
                                   autocomplete="off"
                                   >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ghi chú</label>
                                    <input 
                                    type="text" 
                                    name="description" 
                                    value="{{ old('description') }}" 
                                    class="form-control" 
                                    placeholder="" 
                                    autocomplete="off"
                                    >
                                </div>
                            </div>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu lại</button>
        </div>
    </div>
</form>
<script>
    var province_id = '{{ old('province_id') }}'
    var district_id = '{{ old('district_id') }}'
    var ward_id = '{{ old('ward_id') }}'
</script>
