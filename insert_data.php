<?php
require 'vendor/autoload.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orangehrm_mysql";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} 


$faker = Faker\Factory::create();

$countries = [
    ["VN", "VIET NAM", "Viet Nam", "VNM", "704"],
    ["AD", "ANDORRA", "Andorra", "AND", "20"],
    ["AE", "UNITED ARAB EMIRATES", "United Arab Emirates", "ARE", "784"],
    ["AF", "AFGHANISTAN", "Afghanistan", "AFG", "4"],
    ["AG", "ANTIGUA AND BARBUDA", "Antigua and Barbuda", "ATG", "28"],
    ["AI", "ANGUILLA", "Anguilla", "AIA", "660"],
    ["AL", "ALBANIA", "Albania", "ALB", "8"],
    ["AM", "ARMENIA", "Armenia", "ARM", "51"],
    ["AO", "ANGOLA", "Angola", "AGO", "24"],
    ["AR", "ARGENTINA", "Argentina", "ARG", "32"],
    ["AT", "AUSTRIA", "Austria", "AUT", "40"],
    ["AU", "AUSTRALIA", "Australia", "AUS", "36"],
    ["AZ", "AZERBAIJAN", "Azerbaijan", "AZE", "31"],
    ["BA", "BOSNIA AND HERZEGOVINA", "Bosnia and Herzegovina", "BIH", "70"],
    ["BB", "BARBADOS", "Barbados", "BRB", "52"],
    ["BD", "BANGLADESH", "Bangladesh", "BGD", "50"],
    ["BE", "BELGIUM", "Belgium", "BEL", "56"],
    ["BF", "BURKINA FASO", "Burkina Faso", "BFA", "854"],
    ["BG", "BULGARIA", "Bulgaria", "BGR", "100"],
    ["BH", "BAHRAIN", "Bahrain", "BHR", "48"],
    ["BI", "BURUNDI", "Burundi", "BDI", "108"],
    ["BJ", "BENIN", "Benin", "BEN", "204"],
    ["BR", "BRAZIL", "Brazil", "BRA", "76"],
    ["BS", "BAHAMAS", "Bahamas", "BHS", "44"],
    ["BT", "BHUTAN", "Bhutan", "BTN", "64"],
    ["BW", "BOTSWANA", "Botswana", "BWA", "72"],
    ["BY", "BELARUS", "Belarus", "BLR", "112"],
    ["BZ", "BELIZE", "Belize", "BLZ", "84"],
    ["CA", "CANADA", "Canada", "CAN", "124"],
    ["CH", "SWITZERLAND", "Switzerland", "CHE", "756"],
    ["CI", "COTE D'IVOIRE", "Cote D'Ivoire", "CIV", "384"],
    ["CL", "CHILE", "Chile", "CHL", "152"],
    ["CM", "CAMEROON", "Cameroon", "CMR", "120"],
    ["CN", "CHINA", "China", "CHN", "156"],
    ["CO", "COLOMBIA", "Colombia", "COL", "170"],
    ["CR", "COSTA RICA", "Costa Rica", "CRI", "188"],
    ["CU", "CUBA", "Cuba", "CUB", "192"],
    ["CV", "CAPE VERDE", "Cape Verde", "CPV", "132"],
    ["CY", "CYPRUS", "Cyprus", "CYP", "196"],
    ["CZ", "CZECH REPUBLIC", "Czech Republic", "CZE", "203"],
    ["DE", "GERMANY", "Germany", "DEU", "276"],
    ["DK", "DENMARK", "Denmark", "DNK", "208"],
    ["DO", "DOMINICAN REPUBLIC", "Dominican Republic", "DOM", "214"],
    ["DZ", "ALGERIA", "Algeria", "DZA", "12"],
    ["EC", "ECUADOR", "Ecuador", "ECU", "218"],
    ["EE", "ESTONIA", "Estonia", "EST", "233"],
    ["EG", "EGYPT", "Egypt", "EGY", "818"]
];


$nationalities  = [
    [1, "Afghan"],
    [2, "Albanian"],
    [3, "Algerian"],
    [4, "American"],
    [5, "Andorran"],
    [6, "Angolan"],
    [7, "Antiguans"],
    [8, "Argentinean"],
    [9, "Armenian"],
    [10, "Australian"],
    [11, "Austrian"],
    [12, "Azerbaijani"],
    [13, "Bahamian"],
    [14, "Bahraini"],
    [15, "Bangladeshi"],
    [16, "Barbadian"],
    [17, "Barbudans"],
    [18, "Batswana"],
    [19, "Belarusian"],
    [20, "Belgian"],
    [21, "Belizean"],
    [22, "Beninese"],
    [23, "Bhutanese"],
    [24, "Bolivian"],
    [25, "Bosnian"],
    [26, "Brazilian"],
    [27, "British"],
    [28, "Bruneian"],
    [29, "Bulgarian"],
    [30, "Burkinabe"],
    [31, "Burmese"],
    [32, "Burundian"],
    [33, "Cambodian"],
    [34, "Cameroonian"],
    [35, "Canadian"],
    [36, "Cape Verdean"],
    [37, "Central African"],
    [38, "Chadian"],
    [39, "Chilean"],
    [40, "Chinese"],
    [41, "Colombian"],
    [42, "Comoran"],
    [43, "Congolese"],
    [44, "Costa Rican"],
    [45, "Croatian"],
    [46, "Cuban"],
    [47, "Cypriot"],
    [48, "Czech"],
    [49, "Danish"],
    [50, "Djibouti"]
];

$streets = [
    'Le Loi', 'Tran Hung Dao', 'Nguyen Hue', 'Dong Khoi', 'Ly Tu Trong',
    'Pham Ngu Lao', 'Bui Vien', 'Nguyen Trai', 'Le Thanh Ton', 'Dien Bien Phu',
    'Cong Quynh', 'Ham Nghi', 'Nam Ky Khoi Nghia', 'Nguyen Dinh Chinh', 'Ho Bieu Chanh',
    'Phan Ke Binh', 'Ba Huyen Thanh Quan', 'Tran Quoc Toan', 'Nguyen Dinh Chieu', 'Vo Van Tan',
    'Phan Dinh Phung', 'Ton Duc Thang', 'Ngo Duc Ke', 'Truong Dinh', 'Nguyen Thi Minh Khai',
    'Phung Hung', 'Phan Boi Chau', 'Le Duan', 'Hoang Dieu', 'Dinh Tien Hoang',
    'Hang Bac', 'Hang Dao', 'Hang Bong', 'Hang Gai', 'Pho Hue',
    'Ta Hien', 'Luong Ngoc Quyen', 'Ma May', 'Hang Buom', 'Tran Phu',
    'Yen Phu', 'Van Cao', 'Nguyen Dong Chi', 'Trinh Cong Son', 'Vo Nguyen Giap',
    'Bach Dang', 'Le Van Sy', 'Truong Son', 'Nguyen Van Cu', 'Lac Long Quan',
    'Nguyen Thai Hoc', 'Xuan Dieu', 'To Ngoc Van', 'Duong Dinh Nghe', 'Nguyen Co Thach',
    'Le Dai Hanh', 'Phan Dang Luu', 'Nguyen Son', 'Nguyen Canh Chan', '3 Thang 2',
    'Truong Chinh', 'Hoang Van Thu', 'Ly Thai To', 'Ly Thuong Kiet', 'Tran Nhan Tong',
    'Le Thanh Tong', 'Tran Quang Khai', 'Nguyen Khuyen', 'Nguyen Du', 'Chu Van An',
    'Ho Xuan Huong', 'Ba Trieu', 'Phan Chau Trinh', 'Nguyen Dinh Hoi', 'Nguyen Gia Tri',
    'Dang Thai Mai', 'Hoang Hoa Tham', 'Nguyen Chi Thanh', 'Le Quy Don', 'Le Ngo Cat',
    'Ham Long', 'Le Ngoc Han', 'Pho Co', 'Ngo Quyen', 'Bui Thi Xuan',
    'Ton That Tung', 'Hai Ba Trung', 'Tran Binh Trong', 'Nguyen Thong', 'Au Co',
    'Tran Xuan Soan', 'Ly Chinh Thang', 'Pham Van Hai', 'Bach Mai', 'Tran Duy Hung',
    'Nguyen Khanh Toan', 'Nguyen Ngoc Vu', 'Hoang Dao Thuy', 'Nguyen Van Huyen', 'Vu Pham Ham',
    'Le Van Luong', 'Nguyen Khang', 'Trung Kinh', 'Trung Hoa', 'Van Bao',
    'Van Phuc', 'Lieu Giai', 'Ngoc Khanh', 'Cat Linh', 'La Thanh',
    'Lang Ha', 'Chua Boc', 'Pham Ngoc Thach', 'Luong Dinh Cua', 'Thuy Khue',
    'Hoang Quoc Viet', 'Nguyen Quoc Tri', 'Phan Ke Binh', 'Nguyen Van Thoai', 'Nguyen Canh Di',
    'Tran Huy Lieu', 'Nguyen Kiem', 'Hoang Sa', 'Truong Sa', 'Le Phung Hieu',
    'Vo Chi Cong', 'Phung Chi Kien', 'Nguyen Dang Giai', 'Do Quang', 'Nguyen Hong',
    'Van Cao', 'Doi Can', 'Hoang Cau', 'Tay Son', 'Thai Ha',
    'Lang', 'Dang Tien Dong', 'Tran Quoc Hoan', 'Cau Giay', 'Xuan Thuy',
    'Nguyen Phong Sac', 'Le Duc Tho', 'Ho Tung Mau', 'Nguyen Van Linh', 'Tran Thai Tong',
    'Duy Tan', 'Pham Hung', 'Nguyen Khanh Toan', 'Nguyen Van Loc', 'Nguyen Duong Thu Minh',
    'Pham Van Dong', 'To Huu', 'Nguyen Trai', 'Khuat Duy Tien', 'Le Trong Tan',
    'Nguyen Xien', 'Dao Tan', 'Kim Ma', 'Pham Huy Thong', 'Nguyen Cong Hoan',
    'Pham Tuan Tai', 'Nguyen Khac Hieu', 'Nguyen Chi Thanh', 'Tran Dinh Xu', 'Co Giang',
    'Pho Duc Chinh', 'Ton That Thiep', 'Nguyen Sieu', 'Thu Khoa Huan', 'Tran Hung Dao',
    'Mac Thi Buoi', 'Le Anh Xuan', 'Huynh Thuc Khang', 'Ton That Dam', 'Dong Khoi',
    'Thi Sach', 'Hai Trieu', 'Ngo Duc Ke', 'Le Thanh Ton', 'Ly Tu Trong',
    'Ben Thanh', 'Ham Nghi', 'Cong Truong Me Linh', 'Nguyen Hue', 'Han Thuyen',
    'Le Duan', 'Nguyen Du', 'Nam Ky Khoi Nghia', 'Pham Hong Thai', 'Le Lai',
    'De Tham', 'Bui Thi Xuan', 'Ky Con', 'Le Loi', 'Pasteur',
    'Le Quy Don', 'Nguyen Dinh Chieu', 'Phan Ke Binh', 'Nguyen Binh Khiem', 'Nguyen Van Binh',
    'Nguyen Cu Trinh', 'Nguyen Thai Binh', 'Pho Co Dieu', 'Tan Da', 'Le Cong Kieu',
    'Phung Khac Khoan', 'Ly Chinh Thang', 'Le Van Sy', 'Cao Thang', 'Bach Dang',
    'Dinh Bo Linh', 'Dien Bien Phu', 'Vo Thi Sau', 'Ho Bieu Chanh', 'Ba Huyen Thanh Quan',
    'Truong Sa', 'Hoang Sa', 'Le Thanh Ton', 'Nguyen Van Troi', 'Phan Dang Luu',
    'Nguyen Van Dau', 'Phan Dinh Phung', 'Nguyen Truong To', 'Pham The Hien', 'Nguyen Trai'
];


function generateRandomString($length = 6) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function randomPhoneNumber() {
    $prefixes = ["09", "03", "07", "08"];
    $prefix = $prefixes[array_rand($prefixes)];
    
    $phone = $prefix;
    for ($i = 0; $i < 8; $i++) { // Chỉ cần thêm 8 chữ số nữa vì 2 chữ số đầu đã được xác định
        $phone .= rand(0, 9);
    }
    return $phone;
}

$emp_hm_telephone = randomPhoneNumber();

function generateRandomDate($startYear, $endYear) {
    $year = rand($startYear, $endYear);
    $month = rand(1, 12);
    $day = rand(1, 28);  // Simple logic to ensure valid days across all months
    return "$year-$month-$day";
}
$employeesData = []; 


for ($i = 0; $i < 2002; $i++) {
    $emp_number = $i+3;
    $emp_lastname = $faker->lastname;
    $emp_firstname = $faker->firstName;
    $countryIndex = rand(0, count($countries) - 1);
    $countryData = $countries[$countryIndex];
    $nationalitiesIndex = rand(0, count($nationalities) - 1);
    $nationalityData = $nationalities[$nationalitiesIndex];
    $randomStreetName = $streets[array_rand($streets)];
    $employee = [
            'emp_number' => $emp_number,
            'employee_id' => '00' . $emp_number,
            'emp_lastname' => $emp_lastname,
            'emp_firstname' => $emp_firstname,
            'emp_birthday' => generateRandomDate(1960, 2001),
            'nation_code' => $nationalityData[0],
            'emp_gender' => rand(1, 2),
            'emp_marital_status' => $faker->randomElement(['Single', 'Married', 'Other']),
            'emp_dri_lice_num' => generateRandomString(),
            'emp_dri_lice_exp_date' => generateRandomDate(2023, 2030),
            'emp_status' => rand(1, 10),
            'job_title_code' => rand(1, 20),
            'eeo_cat_code' => rand(1, 9),
            'work_station' => ($i % 20) + 1,
            'emp_street1' => rand(1, 500) . ' ' . $randomStreetName, 
            'city_code' => NULL,
            'coun_code' => $countryData[0],
            'emp_zipcode' => '700000',
            'emp_hm_telephone' => randomPhoneNumber(),
            'emp_mobile' => randomPhoneNumber(),
            'emp_work_email' => strtolower($emp_firstname) . strtolower($emp_lastname) . $nationalityData[0] . $faker->randomElement(['@gmail.com', '@outlook.com', '@yahoo.com']),
            'joined_date' => generateRandomDate(2019, 2023),
        ];
    $employeesData[] = $employee; 
}

$stmt = $conn->prepare("INSERT INTO hs_hr_employee(
    emp_number, employee_id, emp_lastname, emp_firstname, emp_birthday, nation_code, 
    emp_gender, emp_marital_status, emp_dri_lice_num, emp_dri_lice_exp_date, emp_status, 
    job_title_code, eeo_cat_code, work_station, emp_street1, city_code, coun_code, 
    emp_zipcode, emp_hm_telephone, emp_mobile, emp_work_email, joined_date
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

foreach ($employeesData as $employee) {
    $stmt->bind_param(
        "issssisissiisississsss",
        $employee['emp_number'],
        $employee['employee_id'],
        $employee['emp_lastname'],
        $employee['emp_firstname'],
        $employee['emp_birthday'],
        $employee['nation_code'],
        $employee['emp_gender'],
        $employee['emp_marital_status'],
        $employee['emp_dri_lice_num'],
        $employee['emp_dri_lice_exp_date'],
        $employee['emp_status'],
        $employee['job_title_code'],
        $employee['eeo_cat_code'],
        $employee['work_station'],
        $employee['emp_street1'],
        $employee['city_code'],
        $employee['coun_code'],
        $employee['emp_zipcode'],
        $employee['emp_hm_telephone'],
        $employee['emp_mobile'],
        $employee['emp_work_email'],
        $employee['joined_date']
    );
    
    if ($stmt->execute()) {
        echo "New record created successfully<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
}
$stmt->close();
$conn->close();
?>
