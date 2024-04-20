@php
    $permissions = session()->get('permissions');

@endphp
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="/dashboard" class="sidebar-brand">
            مسارى <span> </span> <span style="font-size: 14px">للشحن المحلى`</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body" style="overflow-y:scroll">
        <ul class="nav">
            <li class="nav-item nav-category">الرئيسية</li>
            <li class="nav-item" data-url="dashboard">
                <a href="/dashboard" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">لوحة التحكم</span>
                </a>
            </li>


                <li class="nav-item nav-category"> مناديب التوصيل</li>



                <li class="nav-item" data-url="deliver">
                    <a class="nav-link" data-bs-toggle="collapse" href="#mandob" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title"> مناديب التوصيل</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="mandob">
                        <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="/new-delivery" class="nav-link">إضافة مندوب توصيل</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/deliveries" class="nav-link">بحث فى مناديب التوصيل</a>
                                </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item nav-category"> الشحنات والمرتجعات</li>

                <li class="nav-item" data-url="ss">
                    <a class="nav-link" data-bs-toggle="collapse" href="#shipping-orders" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="git-pull-request"></i>
                        <span class="link-title"> إدارة الشحنات</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="shipping-orders">
                        <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="/new-delivery" class="nav-link">إضافة شحنة جديدة</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/delivery" class="nav-link">بحث فى جميع الشحنات</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/delivery" class="nav-link">شحنات مع المندوبين</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/delivery" class="nav-link">المرتجعات</a>
                                </li>
                        </ul>
                    </div>
                </li>



                <li class="nav-item nav-category">الموظفين</li>



                <li class="nav-item" data-url="employee">
                    <a class="nav-link" data-bs-toggle="collapse" href="#users" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">إدارة الموظفين</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav sub-menu">

                                <li class="nav-item">
                                    <a href="/new-employee" class="nav-link">إضافة موظف</a>
                                </li>


                                <li class="nav-item">
                                    <a href="/employees" class="nav-link">بحث فى الموظفين</a>
                                </li>

                        </ul>
                    </div>
                </li>



                <li class="nav-item" data-url="role">
                    <a class="nav-link" data-bs-toggle="collapse" href="#roles" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="user-check"></i>
                        <span class="link-title">صلاحيات الموظفين</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>

                    <div class="collapse" id="roles">
                        <ul class="nav sub-menu">

                                <li class="nav-item">
                                    <a href="/new-role" class="nav-link">صلاحية جديدة</a>
                                </li>


                                <li class="nav-item">
                                    <a href="/roles" class="nav-link">صلاحيات الموظفين</a>
                                </li>

                        </ul>
                    </div>
                </li>



                <li class="nav-item nav-category">الإعدادات</li>
                <li class="nav-item" data-url="terms">
                    <a class="nav-link" data-bs-toggle="collapse" href="#terms" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">الشروط والأحكام</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="terms">
                        <ul class="nav sub-menu">
                            @if (in_array('create-term', $permissions))
                                <li class="nav-item">
                                    <a href="/new-terms-conditions" class="nav-link">إضافة جديد</a>
                                </li>
                            @endif
                            @if (in_array('view-term', $permissions))
                                <li class="nav-item">
                                    <a href="/terms-conditions" class="nav-link">مراجعة الشروط والأحكام</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>

            <li class="nav-item nav-category">إعدادات الحساب</li>
            <li class="nav-item" data-url="change-password">
                <a href="/change-password" class="nav-link">
                    <i class="link-icon" data-feather="key"></i>
                    <span class="link-title">تغيير كلمة السر</span>
                </a>
            </li>
            <li class="nav-item" data-url="logout">
                <a href="/logout" class="nav-link">
                    <i class="link-icon" data-feather="lock"></i>
                    <span class="link-title">تسجيل الخروج</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
