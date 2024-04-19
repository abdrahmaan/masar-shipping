@php
    $permissions = session()->get('permissions');

@endphp
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="/dashboard" class="sidebar-brand">
            Atlas<span>Golden</span>
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

            @if (in_array('view-individual-client', $permissions) ||
                    in_array('create-individual-client', $permissions) ||
                    in_array('view-commercial-client', $permissions) ||
                    in_array('create-commercial-client', $permissions) ||
                    in_array('view-appointment', $permissions) ||
                    in_array('view-letters', $permissions) ||
                    in_array('view-financial-request', $permissions) ||
                    in_array('view-payments', $permissions))
                <li class="nav-item nav-category"> العملاء</li>
            @endif


            @if (in_array('view-individual-client', $permissions) || in_array('create-individual-client', $permissions))
                <li class="nav-item" data-url="individual">
                    <a class="nav-link" data-bs-toggle="collapse" href="#client-personal" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">العميل الفردى</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="client-personal">
                        <ul class="nav sub-menu">
                            @if (in_array('create-individual-client', $permissions))
                                <li class="nav-item">
                                    <a href="/new-individual-client" class="nav-link">إضافة عميل فردى</a>
                                </li>
                            @endif
                            @if (in_array('view-individual-client', $permissions))
                                <li class="nav-item">
                                    <a href="/individual-clients" class="nav-link"> العملاء الفرديين</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            @if (in_array('view-commercial-client', $permissions) || in_array('create-commercial-client', $permissions))
                <li class="nav-item" data-url="commercial">
                    <a class="nav-link" data-bs-toggle="collapse" href="#driver" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">العميل التجارى</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="driver">
                        <ul class="nav sub-menu">
                            @if (in_array('create-commercial-client', $permissions))
                                <li class="nav-item">
                                    <a href="/new-commercial-client" class="nav-link">إضافة عميل تجارى</a>
                                </li>
                            @endif
                            @if (in_array('view-commercial-client', $permissions))
                                <li class="nav-item">
                                    <a href="/commercial-clients" class="nav-link"> العملاء التجاريين</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            @if (in_array('view-appointment', $permissions))
                <li class="nav-item" data-url="appointment">
                    <a href="/appointments" class="nav-link">
                        <i class="link-icon" data-feather="table"></i>
                        <span class="link-title">مواعيد العملاء</span>

                        <span
                            class="badge rounded-pill bg-danger text-light mx-2">{{ session()->get('appointment') ?? 0 }}
                            سارى</span>
                    </a>
                </li>
            @endif
            @if (in_array('view-letters', $permissions))
                <li class="nav-item" data-url="letter">
                    <a href="/letters" class="nav-link">
                        <i class="link-icon" data-feather="mail"></i>
                        <span class="link-title">خطابات العملاء</span>
                    </a>
                </li>
            @endif
            @if (in_array('view-financial-request', $permissions))
                <li class="nav-item" data-url="financial-request">
                    <a href="/financial-requests" class="nav-link">
                        <i class="link-icon" data-feather="git-pull-request"></i>
                        <span class="link-title">المطالبات المالية</span>
                    </a>
                </li>
            @endif
            @if (in_array('view-payments', $permissions))
                <li class="nav-item" data-url="payment">
                    <a href="/clients-payments" class="nav-link">
                        <i class="link-icon" data-feather="dollar-sign"></i>
                        <span class="link-title">دفعات العملاء</span>
                    </a>
                </li>
            @endif
            <li class="nav-item d-none" data-url="appointment">
                <a class="nav-link" data-bs-toggle="collapse" href="#road" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="git-merge"></i>
                    <span class="link-title">معاملات العملاء</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="road">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="/appointments" class="nav-link">مواعيد العملاء</a>
                        </li>
                        <li class="nav-item">
                            <a href="/letters" class="nav-link">خطابات العملاء</a>
                        </li>
                        <li class="nav-item">
                            <a href="/financial-requests" class="nav-link">المطالبات المالية</a>
                        </li>
                        <li class="nav-item">
                            <a href="/clients-payments" class="nav-link">دفعات العملاء</a>
                        </li>


                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category d-none">المشاريع والصيانة</li>
            <li class="nav-item d-none">
                <a class="nav-link" data-bs-toggle="collapse" href="#fix3" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="cloud-lightning"></i>
                    <span class="link-title">إدارة المشاريع</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="fix3">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">عقود توريد مصعد</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"> عقود تحديث مصعد</a>
                        </li>


                    </ul>
                </div>
            </li>
            <li class="nav-item d-none">
                <a class="nav-link" data-bs-toggle="collapse" href="#fix2" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="cloud-lightning"></i>
                    <span class="link-title">إدارة الصيانة</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="fix2">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">عقود الصيانة</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"> تقرير صيانة جديد</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">تقارير الصيانة</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">أوردرات الصيانة</a>
                        </li>


                    </ul>
                </div>
            </li>

            <li class="nav-item nav-category d-none">عروض الأسعار</li>
            <li class="nav-item d-none">
                <a class="nav-link" data-bs-toggle="collapse" href="#price-list" role="button"
                    aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="cloud-lightning"></i>
                    <span class="link-title">عروض الأسعار</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="price-list">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">عروض توريد مصعد</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"> عروض تحديث مصعد</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"> عروض أسعار صيانة</a>
                        </li>


                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category d-none">الأعطال الفنية</li>
            <li class="nav-item d-none">
                <a class="nav-link" data-bs-toggle="collapse" href="#fix" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="cloud-lightning"></i>
                    <span class="link-title">بلاغات الأعطال</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="fix">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link">إضافة بلاغ جديد</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">بلاغات الأعطال</a>
                        </li>


                    </ul>
                </div>
            </li>

            @if (in_array('view-employees', $permissions) ||
                    in_array('create-employees', $permissions) ||
                    in_array('view-role', $permissions) ||
                    in_array('create-role', $permissions))
                <li class="nav-item nav-category">الموظفين</li>
            @endif
            @if (in_array('view-employees', $permissions) || in_array('create-employees', $permissions))

                <li class="nav-item" data-url="employee">
                    <a class="nav-link" data-bs-toggle="collapse" href="#users" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">إدارة الموظفين</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav sub-menu">
                            @if (in_array('create-employees', $permissions))
                                <li class="nav-item">
                                    <a href="/new-employee" class="nav-link">إضافة موظف</a>
                                </li>
                            @endif
                            @if (in_array('view-employees', $permissions))
                                <li class="nav-item">
                                    <a href="/employees" class="nav-link">بحث فى الموظفين</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif

            @if (in_array('view-role', $permissions) || in_array('create-role', $permissions))
                <li class="nav-item" data-url="role">
                    <a class="nav-link" data-bs-toggle="collapse" href="#roles" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="user-check"></i>
                        <span class="link-title">صلاحيات الموظفين</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>

                    <div class="collapse" id="roles">
                        <ul class="nav sub-menu">
                            @if (in_array('create-role', $permissions))
                                <li class="nav-item">
                                    <a href="/new-role" class="nav-link">صلاحية جديدة</a>
                                </li>
                            @endif
                            @if (in_array('view-role', $permissions))
                                <li class="nav-item">
                                    <a href="/roles" class="nav-link">صلاحيات الموظفين</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif

            @if (in_array('view-term', $permissions) ||
                    in_array('create-term', $permissions) ||
                    in_array('view-penal', $permissions) ||
                    in_array('create-penal', $permissions) ||
                    in_array('view-waranty', $permissions) ||
                    in_array('create-waranty', $permissions) ||
                    in_array('view-elevator-specs', $permissions) ||
                    in_array('create-elevator-specs', $permissions) ||
                    in_array('view-bank-account', $permissions) ||
                    in_array('create-bank-account', $permissions))
                <li class="nav-item nav-category">الإعدادات</li>
            @endif
            @if (in_array('view-term', $permissions) || in_array('create-term', $permissions))
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
            @endif
            @if (in_array('view-penal', $permissions) || in_array('create-penal', $permissions))
                <li class="nav-item" data-url="penal-provision">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sett" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">الأحكام الجزائية</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="sett">
                        <ul class="nav sub-menu">
                            @if (in_array('create-penal', $permissions))
                                <li class="nav-item">
                                    <a href="/new-penal-provision" class="nav-link">إضافة جديد</a>
                                </li>
                            @endif
                            @if (in_array('view-penal', $permissions))
                                <li class="nav-item">
                                    <a href="/penal-provisions" class="nav-link">مراجعة الأحكام الجزائية</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif
            @if (in_array('view-waranty', $permissions) || in_array('create-waranty', $permissions))
                <li class="nav-item" data-url="waranty">
                    <a class="nav-link" data-bs-toggle="collapse" href="#grant-policy" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">سياسة الضمان</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="grant-policy">
                        <ul class="nav sub-menu">
                            @if (in_array('create-waranty', $permissions))
                                <li class="nav-item">
                                    <a href="/new-waranty-policiy" class="nav-link">إضافة جديد</a>
                                </li>
                            @endif
                            @if (in_array('view-waranty', $permissions))
                                <li class="nav-item">
                                    <a href="/waranty-policies" class="nav-link">مراجعة سياسات الضمان</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif
            @if (in_array('view-second-party', $permissions) || in_array('create-second-party', $permissions))
                <li class="nav-item" data-url="second-part">
                    <a class="nav-link" data-bs-toggle="collapse" href="#second-part" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">واجبات الطرف الثانى</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="second-part">
                        <ul class="nav sub-menu">
                            @if (in_array('create-second-party', $permissions))
                                <li class="nav-item">
                                    <a href="/new-second-party" class="nav-link">إضافة جديد</a>
                                </li>
                            @endif
                            @if (in_array('view-second-party', $permissions))
                                <li class="nav-item">
                                    <a href="/second-parties" class="nav-link">مراجعة واجبات الطرف الثانى</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>

            @endif
            @if (in_array('view-elevator-specs', $permissions) || in_array('create-elevator-specs', $permissions))
                <li class="nav-item" data-url="elevator-specification">
                    <a class="nav-link" data-bs-toggle="collapse" href="#elevator-info" role="button"
                        aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">مواصفات المصعد</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="elevator-info">
                        <ul class="nav sub-menu">
                            @if (in_array('create-elevator-specs', $permissions))
                                <li class="nav-item">
                                    <a href="/new-elevator-specification" class="nav-link">إضافة جديد</a>
                                </li>
                            @endif
                            @if (in_array('view-elevator-specs', $permissions))
                                <li class="nav-item">
                                    <a href="/elevator-specifications" class="nav-link">مراجعة مواصفات المصعد</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
            @endif
            @if (in_array('view-bank-account', $permissions) || in_array('create-bank-account', $permissions))
                <li class="nav-item" data-url="bank-account">
                    <a href="/bank-account" class="nav-link">
                        <i class="link-icon" data-feather="settings"></i>
                        <span class="link-title">بيانات الحساب البنكى</span>
                    </a>
                </li>
            @endif
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
