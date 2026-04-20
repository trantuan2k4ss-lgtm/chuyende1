<div class="mb-3">
    <label>Code</label>
    <input type="text" name="code" value="{{ $voucher->code ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>Tên</label>
    <input type="text" name="name" value="{{ $voucher->name ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>Loại</label>
    <select name="type" class="form-control">
        <option value="percent" {{ ($voucher->type ?? '')=='percent'?'selected':'' }}>%</option>
        <option value="fixed" {{ ($voucher->type ?? '')=='fixed'?'selected':'' }}>VNĐ</option>
    </select>
</div>

<div class="mb-3">
    <label>Giá trị</label>
    <input type="number" name="value" value="{{ $voucher->value ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>Đơn tối thiểu</label>
    <input type="number" name="min_order" value="{{ $voucher->min_order ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>Số lượng</label>
    <input type="number" name="quantity" value="{{ $voucher->quantity ?? 0 }}" class="form-control">
</div>

<div class="mb-3">
    <label>Ngày bắt đầu</label>
    <input type="date" name="start_date" value="{{ $voucher->start_date ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>Ngày kết thúc</label>
    <input type="date" name="end_date" value="{{ $voucher->end_date ?? '' }}" class="form-control">
</div>

<div class="mb-3">
    <label>Trạng thái</label>
    <select name="status" class="form-control">
        <option value="hien">Hiện</option>
        <option value="an" {{ ($voucher->status ?? '')=='an'?'selected':'' }}>Ẩn</option>
    </select>
</div>