<?php

use Illuminate\Database\Seeder;

class New_transTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_tran = new \App\New_tran();
        $new_tran->name = 'Thông báo ĐHĐCĐ thường niên năm 2017';
        $new_tran->description = 'Công ty Cổ phần Frit Huế xin gửi đến Quý Cổ đông Thông báo về việc tổ chức Đại hội đồng cổ đông thường niên năm 2017, lần thứ nhất, nhiệm kỳ 2016-2020.';
        $new_tran->content = 'Công ty Cổ phần Frit Huế xin gửi đến Quý Cổ đông Thông báo về việc tổ chức Đại hội đồng cổ đông thường niên năm 2017, lần thứ nhất, nhiệm kỳ 2016-2020.';
        $new_tran->new_id = 1;
        $new_tran->locale = 'vi';
        $new_tran->save();

        $new_tran = new \App\New_tran();
        $new_tran->name = 'Notice of Annual General Meeting of Shareholders 2017';
        $new_tran->description = 'Frit Hue Corporation would like to send to Shareholders the Notice of organizing the 2017 Annual General Meeting of Shareholders, the first term, the term 2016-2020.';
        $new_tran->content = 'Frit Hue Corporation would like to send to Shareholders the Notice of organizing the 2017 Annual General Meeting of Shareholders, the first term, the term 2016-2020.';
        $new_tran->new_id = 1;
        $new_tran->locale = 'en';
        $new_tran->save();

        $new_tran = new \App\New_tran();
        $new_tran->name = 'Tình hình kinh tế và sản xuất gốm sứ các nước thành viên CICA';
        $new_tran->description = 'Vừa qua ngày 28/10/2016 Hội nghị CICA lần thứ 23 đã được tổ chức tại Hà Nội, Việt Nam. ';
        $new_tran->content = 'Vừa qua ngày 28/10/2016 Hội nghị CICA lần thứ 23 đã được tổ chức tại Hà Nội, Việt Nam.';
        $new_tran->new_id = 2;
        $new_tran->locale = 'vi';
        $new_tran->save();

        $new_tran = new \App\New_tran();
        $new_tran ->name = 'Economic situation and ceramics production of CICA member countries';
        $new_tran->description = 'Recently, October 28, 2016, the 23rd CICA Conference was held in Hanoi, Vietnam.';
        $new_tran->content = 'Recently, October 28, 2016, the 23rd CICA Conference was held in Hanoi, Vietnam.';
        $new_tran->new_id = 2;
        $new_tran->locale = 'en';
        $new_tran->save();


        $new_tran = new \App\New_tran();
        $new_tran->name = 'Thông báo ĐHĐCĐ thường niên năm 2017';
        $new_tran->description = 'Công ty Cổ phần Frit Huế công bố thông tin thay đổi giấy chứng nhận đăng ký doanh nghiệp';
        $new_tran->content = 'Công ty Cổ phần Frit Huế công bố thông tin thay đổi giấy chứng nhận đăng ký doanh nghiệp';
        $new_tran->new_id = 3;
        $new_tran->locale = 'vi';
        $new_tran->save();

        $new_tran = new \App\New_tran();
        $new_tran->name = 'Disclosure of information on change of business registration certificate';
        $new_tran->description = 'Frit Hue Joint Stock Company announces information of changing its business registration certificate.';
        $new_tran->content = 'Frit Hue Joint Stock Company announces information of changing its business registration certificate.';
        $new_tran->new_id = 3;
        $new_tran->locale = 'en';
        $new_tran->save();
    }
}
