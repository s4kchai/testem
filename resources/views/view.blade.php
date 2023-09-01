<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>รายการรายรับ/รายจ่าย</title>
</head>
<body>
    <h1>รายการรายรับ/รายจ่าย</h1>

 
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>คำนำหน้าชื่อ</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>วันเดือนปีเกิด</th>
                <th>อายุ</th>
                <th>รูปภาพโปรไฟล์</th>
                <th>วันเวลาที่ปรับปรุง</th>
                <th>ตัวเลือก</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->prefix }}</td>
                    <td>{{ $record->first_name }}</td>
                    <td>{{ $record->last_name }}</td>
                    <td>{{ $record->birthdate }}</td>
                    <td>{{ $record->age }}</td>
                    <td>
                        @if($record->profile_image)
                            <img src="{{ asset('storage/' . $record->profile_image) }}" alt="Profile Image" width="50">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $record->last_updated_at }}</td>
                    <td>
                      
                        <a href="{{ route('financial-records.edit', $record->id) }}">แก้ไข</a>
                        <form action="{{ route('financial-records.destroy', $record->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบรายการนี้?')">ลบ</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

  
</body>
</html>
