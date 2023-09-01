<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มรายการรายรับ/รายจ่าย</title>
</head>
<body>
    <h1>เพิ่มรายการรายรับ/รายจ่าย</h1>

 {{-- ตรวจสอบข้อผิดพลาด --}}
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('financial-records.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div>
            <label for="prefix">คำนำหน้าชื่อ:</label>
            <select name="prefix" id="prefix">
                <option value="นาย">นาย</option>
                <option value="นาง">นาง</option>
                <option value="นางสาว">นางสาว</option>
            </select>
        </div>
    
        <div>
            <label for="first_name">ชื่อ:</label>
            <input type="text" name="first_name" id="first_name" required>
        </div>
    
        <div>
            <label for="last_name">นามสกุล:</label>
            <input type="text" name="last_name" id="last_name" required>
        </div>
    
        <div>
            <label for="birthdate">วันเดือนปีเกิด:</label>
            <input type="date" name="birthdate" id="birthdate" required>
        </div>
    
        <div>
            <label for="profile_image">รูปภาพโปรไฟล์:</label>
            <input type="file" name="profile_image" id="profile_image">
        </div>
    
        <button type="submit">บันทึก</button>
        <
    </form>
</body>
</html>
