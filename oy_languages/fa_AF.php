<?php



global $_LANG;

// Categories
$_LANG['dep']='دیپارتمنت';
$_LANG['site']='سایت';
$_LANG['groups']='تیم';
$_LANG['priority']='اولیت';
$_LANG['tickettags']='وضعیت';
$_LANG['leavetypes']='نوع رخصتی';


//pageing
$_LANG['pervious']='قبلی';
$_LANG['next']='بعدی';
$_LANG['last']='آخرین';

$_LANG['jobtitle']='عنوان کاری';
$_LANG['add']='اضافه کردن';
$_LANG['delete']='حذف';
$_LANG['sendmessage']='ارسال پیام';


//messages
$_LANG['douwant2dl']='آیا شما مطمئن هستید که میخواهید این گزینه را حذف کنید؟';
$_LANG['saved']='موفقانه ثبت شد.';
$_LANG['deleted']='گزینه حذف شد و قابل برگشت نیست!';
$_LANG['edited']='با موفقیت ویرایش شد';
$_LANG['errortry']='به مشکل مواجه شده اید, دوباره تلاش کنید';

//MENUS
$_LANG['hr']='منابع بشری';

$_LANG['enteraccountname']='لطفا نام حساب را بنویسید!';

//header
$_LANG['dashborad']='آمار کلی';

$_LANG['buysell']='خرید روغنیات / فروش';
    $_LANG['sell']='فروش';
    $_LANG['buy']='خرید';
    $_LANG['list']='لیست';
$_LANG['financial']='مالی';
$_LANG['reports']='گزارشات';
$_LANG['users']='کاربران';
$_LANG['manage']='مدیریت';
$_LANG['users']='کاربران';

//accounts page
$_LANG['currency']='واحد ارزی';
$_LANG['addprimnumber']='مقدار اولیه حساب';
$_LANG['account']='حساب';
$_LANG['accounts']='حسابات';
$_LANG['to']='به'; $_LANG['from']='از'; 
//settings
$_LANG['english']='English';
$_LANG['dari']='دری';

$_LANG['maincurr']='واحد اصلی ارز';
$_LANG['measurement']='واحد اندازه گیری روغنیات';
$_LANG['datetype']='نوعیت تاریخ';
$_LANG['reporttext']='نوشته گزارشات';
$_LANG['headertxt']='نوشته سر ورقی';
$_LANG['footertxt']='نوشته پا ورقی';
$_LANG['currentsettings']='تنظیلمات فعلی';
$_LANG['value']='محتوا';

$_LANG['current']='فعلی';





//update
$_LANG['version']='نسخه';
$_LANG['update']='بروز رسانی';
$_LANG['readreleaselist']='در حال چک سرور جهت گرفتن اپدیت...'; //Reading Current Releases List
$_LANG['newupdatefound']='اپدیت جدید یافت شد';
$_LANG['noupdatefound']='این نسخه آخر نرم افزار است نیازی به اپدیت ندارید';
$_LANG['cannotreadupdates']='مشکلی وجود دارد, نرم افزار نمی تواند به سرور وصل شود.';
$_LANG['updated']='تبریک باشد, نسخه نرم افزار اپدیت شد';
$_LANG['done']='انجام شد';
$_LANG['downloadingupdate']='در حال دریافت نسخه جدید';//Downloading New Update
$_LANG['cannotdownload']='نسخه قابل دریافت نیست';//Downloading New Update
$_LANG['cannosave']='نرم افزار اپدیت را دانلود کرده نمی تواند.'; //Could not save new update. Operation aborted.
$_LANG['updatedownloaded']='اپدیت دریافت شد.';//Update Downloaded And Saved

$_LANG['aleadydownloaded']='از قبل دانلود شده است.';//Update already downloaded
$_LANG['updateready']='آماده نصب نسخه جدید...';//Update already downloaded
$_LANG['installupdate']='نصب نسخه';//Update already downloaded

//licence

$_LANG['licence']='جواز استفاده';
$_LANG['nolicence']='این نسخه هنوز راجستر نشده است.';
$_LANG['licenced']='این  نرم افزار تحت نام زیر راجستر شده است :';
$_LANG['register']='راجستر';
$_LANG['triallicence']='نسخه آزمایشی';
$_LANG['ucanuseuntl']='محلت استفاده الی';
$_LANG['contactus']='تماس بگیرید';
$_LANG['contacttoorder']='جهت سفارش با ما تماس بگیرید.';
$_LANG['liewarning']='هر گونه استفاده غیر قانون از این نرم افزار پیگرد قانونی دارد';



//backup
$_LANG['backup']='پشتیبانگیری';


//login
$_LANG['login']='ورود';
$_LANG['logintoqatra']='ورود به مدیریت استارک';
$_LANG['qatrawelcome']='به نرم افزار مدیریت استارک خوش آمدید';
$_LANG['loginmsg']='جهت ورود از ایمیل/نام کاربردی و پسورد خود استفاده کنید.';










//profile
$_LANG['editprofile']='ویرایش پروفایل';
$_LANG['logout']='خروج';
//user settings
$_LANG['settings']='تنظیمات';



//css classes
$_LANG['otherside']='pull-left';
$_LANG['rightside']='pull-right';
 include_lang('def-'.  get_lang());
if(is_get('t'))
    include_lang(is_get('t').'-'.  get_lang());
//if(is_get('pg')=='jobs')
    include_lang('LANG-FA');
    
    


 $_LANG['comments']='نظریات';
   $_LANG['more']='بیشتر';
   
   
   
   ///forms
   
      $_LANG['house']='مخزن';
         $_LANG['type']='نوع';
           
         
         
             $_LANG['company']='شرکت';  
  $_LANG['mcompany']='محصول';
   $_LANG['tcompany']='بارچالنی';
    $_LANG['ocompany']='اضافه بار';
    
    
    #eoe 
    
    $_LANG['eoe1mon']='پرداخت';
    $_LANG['eoe2mon']='دریافت';
    $_LANG['eoe5mon']='پرداخت متفرقه';
    $_LANG['eoe7mon']='دریافت متفرقه';
    
      $_LANG['eoe1oil']='فروش';
    $_LANG['eoe2oil']='خرید';
    
    
    $_LANG['unvalid']='غیر معتبر';
    