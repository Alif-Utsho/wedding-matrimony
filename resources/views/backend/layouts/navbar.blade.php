<section class="head">
    <div class="container">
        <div class="row header">
            <div class="col-md-3">
                <div class="logo">
                    <img class="logo-brand ic-logo" src="{{ asset($generalsetting->logo) }}" alt="" loading="lazy"
                        style="width: 50px">
                </div>
            </div>
            <div class="col-md-6">
                <div class="top-sarch">
                    <input type="text" placeholder="Search here">
                </div>
            </div>
            <div class="col-md-3">
                <div class="top-set">
                    <ul>
                        {{-- <li>
                            <div class="sett-out smenu-pare">
                                <span class="smenu">
                                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                                </span>
                                <div class="smenu-open top-noti">
                                    <ul>
                                        <li>
                                            <div>
                                                <p>
                                                    <strong>4</strong> New users joined today
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>
                                                    <strong>6</strong> New users waiting for the Admin approve
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>
                                                    <strong>200</strong> Users visiting our website in last day
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>
                                                    <strong>20</strong> Users send <strong>Interst request</strong> in
                                                    last day
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="sett-out smenu-pare">
                                <span class="smenu">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </span>
                                <div class="smenu-open">
                                    <ul>
                                        <li>
                                            <a href="admin-all-users.html" class="waves-effect">
                                                <i class="fa fa-male" aria-hidden="true"></i> All Profiles </a>
                                        </li>
                                        <li>
                                            <a href="admin-price.html" class="waves-effect">
                                                <i class="fa fa-usd" aria-hidden="true"></i> Pricing details </a>
                                        </li>
                                        <li>
                                            <a href="admin-all-payments.html" class="waves-effect">
                                                <i class="fa fa-money" aria-hidden="true"></i> Payments </a>
                                        </li>
                                        <li>
                                            <a href="admin-enquiry.html" class="waves-effect">
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i> Enquiries </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="sett-out smenu-pare">
                                <span class="smenu">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                </span>
                                <div class="smenu-open">
                                    <ul>
                                        <li>
                                            <a href="admin-setting.html" class="waves-effect">
                                                <i class="fa fa-cogs" aria-hidden="true"></i>Site Setting </a>
                                        </li>
                                        <li>
                                            <a href="seo-google-analytics-code.html" class="waves-effect">
                                                <i class="fa fa-list-ul" aria-hidden="true"></i> SEO Settings </a>
                                        </li>
                                        <li>
                                            <a href="admin-profile-filters.html" class="waves-effect">
                                                <i class="fa fa-building-o" aria-hidden="true"></i> All profile filters
                                            </a>
                                        </li>
                                        <li>
                                            <a href="admin-export.html" class="waves-effect">
                                                <i class="fa fa-undo" aria-hidden="true"></i> Backup Data </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li> --}}
                        <li>
                            <div class="sett-out smenu-pare">
                                <span class="smenu">
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                </span>
                                <div class="smenu-open">
                                    <ul>
                                        <li>
                                            <a href="{{ route('admin.logout') }}" class="waves-effect">
                                                <i class="fa fa-sign-out" aria-hidden="true"></i> Log out </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
