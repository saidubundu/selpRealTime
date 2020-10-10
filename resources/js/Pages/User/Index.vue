<template>
    <app-home :auth_user="auth_user">
        <main id="tt-pageContent" class="tt-offset-small">
            <div class="tt-wrapper-section">
                <div class="container">
                    <div class="tt-user-header">
                        <div class="tt-col-avatar">
                            <div class="tt-icon">
                                <svg class="tt-icon">
                                    <use :xlink:href="classes"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="tt-col-title">
                            <div class="tt-title">
                                <a href="#">{{user.name}}</a>
                            </div>
                            <ul class="tt-list-badge">
                                <li><a href="#"><span class="tt-color14 tt-badge">LVL : {{user.points}}</span></a></li>
                            </ul>
                        </div>
                        <div class="tt-col-btn"  v-if="me">
                            <div class="tt-list-btn">
                                <inertia-link href="/user/profile" class="tt-btn-icon">
                                    <svg class="tt-icon">
                                        <use xlink:href="#icon-settings_fill"></use>
                                    </svg>
                                </inertia-link>
                                <button @click.prevent="logout" class="btn btn-secondary">Logout</button>
<!--                                <a href="#" class="btn btn-primary">Message</a>-->
<!--                                <a href="#" class="btn btn-secondary">Follow</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="tt-tab-wrapper">
                    <div class="tt-wrapper-inner">
                        <ul class="nav nav-tabs pt-tabs-default" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " data-toggle="tab" href="#tt-tab-01" role="tab"><span>Activity</span></a>
                            </li>
                            <li class="nav-item show">
                                <a class="nav-link active" data-toggle="tab" href="#tt-tab-02" role="tab"><span>Questions</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tt-tab-03" role="tab"><span>Replies</span></a>
                            </li>
<!--                            <li class="nav-item tt-hide-xs">-->
<!--                                <a class="nav-link" data-toggle="tab" href="#tt-tab-04" role="tab"><span>526 Followers</span></a>-->
<!--                            </li>-->
<!--                            <li class="nav-item tt-hide-md">-->
<!--                                <a class="nav-link" data-toggle="tab" href="#tt-tab-05" role="tab"><span>489 Following</span></a>-->
<!--                            </li>-->
<!--                            <li class="nav-item tt-hide-md">-->
<!--                                <a class="nav-link" data-toggle="tab" href="#tt-tab-06" role="tab"><span>Categories</span></a>-->
<!--                            </li>-->
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane tt-indent-none" id="tt-tab-01" role="tabpanel">
                            <div class="tt-topic-list">
                                <div class="tt-list-header">
                                    <div class="tt-col-topic">Topic</div>
                                    <div class="tt-col-value-large hide-mobile">Category</div>
                                    <div class="tt-col-value-large hide-mobile">Status</div>
                                    <div class="tt-col-value-large hide-mobile">Activity</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-n"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            Does Envato act against the authors of Envato markets?
                                        </a></h6>
                                        <div class="tt-col-message">
                                            <a href="#">Dylan replied:</a> It’s time to channel your inner Magnum P.I., Ron Swanson or Hercule Poroit! It’s the time that all guys (or gals) love and all our partners hate It’s Movember!
                                        </div>
                                        <div class="row align-items-center no-gutters hide-desktope">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color05 tt-badge">music</span></a></li>
                                                </ul>
                                                <a href="#" class="tt-btn-icon show-mobile">
                                                    <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                                </a>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">5 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large hide-mobile"><span class="tt-color05 tt-badge">music</span></div>
                                    <div class="tt-col-value-large hide-mobile">
                                        <a href="#" class="tt-btn-icon">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="tt-col-value-large hide-mobile">5 Jan,19</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-h"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-locked"></use>
                                            </svg>
                                            We Want to Hear From You! What Would You Like?
                                        </a></h6>
                                        <div class="row align-items-center no-gutters hide-desktope">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color06 tt-badge">movies</span></a></li>
                                                </ul>
                                                <a href="#" class="tt-btn-icon show-mobile">
                                                    <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                                                </a>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">5 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large hide-mobile"><span class="tt-color06 tt-badge">movies</span></div>
                                    <div class="tt-col-value-large hide-mobile">
                                        <a href="#" class="tt-btn-icon">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="tt-col-value-large hide-mobile">5 Jan,19</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-j"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            Seeking partner backend developer
                                        </a></h6>
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color13 tt-badge">nature</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">themeforest</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">elements</span></a></li>
                                                </ul>
                                                <a href="#" class="tt-btn-icon show-mobile">
                                                    <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                                                </a>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">4 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large hide-mobile"><span class="tt-color13 tt-badge">nature</span></div>
                                    <div class="tt-col-category tt-col-value-large hide-mobile">
                                        <a href="#" class="tt-btn-icon">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="tt-col-value-large hide-mobile">4 Jan,19</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-t"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            Cannot customize my intro
                                        </a></h6>
                                        <div class="tt-col-message">
                                            <a href="#">Dylan replied:</a> I am noticed it will take little more time to review new authors submissions. All the Best
                                        </div>
                                        <div class="row align-items-center no-gutters hide-desktope">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color04 tt-badge">pets</span></a></li>
                                                </ul>
                                                <a href="#" class="tt-btn-icon show-mobile">
                                                    <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                                </a>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">4 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large hide-mobile"><span class="tt-color04 tt-badge">pets</span></div>
                                    <div class="tt-col-value-large hide-mobile">
                                        <a href="#" class="tt-btn-icon">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="tt-col-value-large hide-mobile">4 Jan,19</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-d"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            Web Hosting Packages for ThemeForest WordPress
                                        </a></h6>
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color03 tt-badge">exchange</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">themeforest</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">elements</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">4 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large"><span class="tt-color03 tt-badge">exchange</span></div>
                                    <div class="tt-col-value-large hide-mobile"></div>
                                    <div class="tt-col-value-large hide-mobile">4 Jan,19</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-k"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-verified"></use>
                                            </svg>
                                            Microsoft Word and Power Point
                                        </a></h6>
                                        <div class="row align-items-center no-gutters hide-desktope">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color08 tt-badge">youtube</span></a></li>
                                                </ul>
                                                <a href="#" class="tt-btn-icon show-mobile">
                                                    <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                                                </a>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">3 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large"><span class="tt-color08 tt-badge">youtube</span></div>
                                    <div class="tt-col-value-large hide-mobile">
                                        <a href="#" class="tt-btn-icon">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-favorite"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="tt-col-value-large hide-mobile">3 Jan,19</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-v"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            First website template got rejected.
                                        </a></h6>
                                        <div class="row align-items-center no-gutters hide-desktope">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><span class="tt-color09 tt-badge">social</span></li>
                                                </ul>
                                                <a href="#" class="tt-btn-icon show-mobile">
                                                    <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                                                </a>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">3 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large"><span class="tt-color09 tt-badge">social</span></div>
                                    <div class="tt-col-value-large hide-mobile">
                                        <a href="#" class="tt-btn-icon">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="tt-col-value-large hide-mobile">3 Jan,19</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-k"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-pinned"></use>
                                            </svg>
                                            Proform or looking for contacting billing department
                                        </a></h6>
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color10 tt-badge">science</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">contests</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">authors</span></a></li>
                                                </ul>
                                                <a href="#" class="tt-btn-icon show-mobile">
                                                    <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                                                </a>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">2 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large"><span class="tt-color10 tt-badge">science</span></div>
                                    <div class="tt-col-value-large hide-mobile">
                                        <a href="#" class="tt-btn-icon">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-like"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="tt-col-value-large hide-mobile">2 Jan,19</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-n"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            Does Envato act against the authors of Envato markets?
                                        </a></h6>
                                        <div class="tt-col-message">
                                            <a href="#">Dylan replied:</a> It’s time to channel your inner Magnum P.I., Ron Swanson or Hercule Poroit! It’s the time that all guys (or gals) love and all our partners hate It’s Movember!
                                        </div>
                                        <div class="row align-items-center no-gutters hide-desktope">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color05 tt-badge">music</span></a></li>
                                                </ul>
                                                <a href="#" class="tt-btn-icon show-mobile">
                                                    <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                                </a>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">5 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large"><span class="tt-color05 tt-badge">music</span></div>
                                    <div class="tt-col-value-large hide-mobile">
                                        <a href="#" class="tt-btn-icon">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="tt-col-value-large hide-mobile">5 Jan,19</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-h"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            <svg class="tt-icon">
                                                <use xlink:href="#icon-locked"></use>
                                            </svg>
                                            We Want to Hear From You! What Would You Like?
                                        </a></h6>
                                        <div class="row align-items-center no-gutters hide-desktope">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color06 tt-badge">movies</span></a></li>
                                                </ul>
                                                <a href="#" class="tt-btn-icon show-mobile">
                                                    <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                                </a>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">5 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large"><span class="tt-color06 tt-badge">movies</span></div>
                                    <div class="tt-col-value-large hide-mobile">
                                        <a href="#" class="tt-btn-icon">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="tt-col-value-large hide-mobile">5 Jan,19</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-j"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            Seeking partner backend developer
                                        </a></h6>
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color13 tt-badge">nature</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">themeforest</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">elements</span></a></li>
                                                </ul>
                                                <a href="#" class="tt-btn-icon show-mobile">
                                                    <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                                                </a>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">4 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large"><span class="tt-color13 tt-badge">nature</span></div>
                                    <div class="tt-col-value-large hide-mobile">
                                        <a href="#" class="tt-btn-icon">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-share"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="tt-col-value-large hide-mobile">4 Jan,19</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-t"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            Cannot customize my intro
                                        </a></h6>
                                        <div class="tt-col-message">
                                            <a href="#">Dylan replied:</a> I am noticed it will take little more time to review new authors submissions. All the Best
                                        </div>
                                        <div class="row align-items-center no-gutters hide-desktope">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color04 tt-badge">pets</span></a></li>
                                                </ul>
                                                <a href="#" class="tt-btn-icon show-mobile">
                                                    <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                                </a>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">4 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large"><span class="tt-color04 tt-badge">pets</span></div>
                                    <div class="tt-col-value-large hide-mobile">
                                        <a href="#" class="tt-btn-icon">
                                            <i class="tt-icon"><svg><use xlink:href="#icon-reply"></use></svg></i>
                                        </a>
                                    </div>
                                    <div class="tt-col-value-large hide-mobile">4 Jan,19</div>
                                </div>
                                <div class="tt-item">
                                    <div class="tt-col-avatar">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-ava-d"></use>
                                        </svg>
                                    </div>
                                    <div class="tt-col-description">
                                        <h6 class="tt-title"><a href="#">
                                            Web Hosting Packages for ThemeForest WordPress
                                        </a></h6>
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-9">
                                                <ul class="tt-list-badge">
                                                    <li class="show-mobile"><a href="#"><span class="tt-color03 tt-badge">exchange</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">themeforest</span></a></li>
                                                    <li><a href="#"><span class="tt-badge">elements</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="col-3 ml-auto show-mobile">
                                                <div class="tt-value">4 Jan,19</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tt-col-category tt-col-value-large"><span class="tt-color03 tt-badge">exchange</span></div>
                                    <div class="tt-col-value-large hide-mobile"></div>
                                    <div class="tt-col-value-large hide-mobile">4 Jan,19</div>
                                </div>
                                <div class="tt-row-btn">
                                    <button type="button" class="btn-icon js-topiclist-showmore">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-load_lore_icon"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tt-indent-none show active" id="tt-tab-02" role="tabpanel">
                            <div class="tt-topic-list">
                                <div class="tt-list-header">
                                    <div class="tt-col-topic">Topic</div>
                                    <div class="tt-col-category">Category</div>
                                    <div class="tt-col-value hide-mobile">Likes</div>
                                    <div class="tt-col-value hide-mobile">Replies</div>
                                    <div class="tt-col-value hide-mobile">Views</div>
                                    <div class="tt-col-value">Activity</div>
                                </div>
                               <user-questions v-if="user" v-for="question in questions" :key="question.id" :data="question"></user-questions>
                                <div class="tt-row-btn">
                                    <button type="button" class="btn-icon js-topiclist-showmore">
                                        <svg class="tt-icon">
                                            <use xlink:href="#icon-load_lore_icon"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <user-replies :replies="replies"></user-replies>
                    </div>
                </div>
            </div>
        </main>
    </app-home>
</template>

<script>
    import AppHome from "../../Layouts/AppHome";
    import UserQuestions from "./UserQuestions";
    import UserReplies from "./UserReplies";
    import Button from "../../Jetstream/Button";
    export default {
        name: "Index",
        components: {Button, UserReplies, UserQuestions, AppHome},
        props:['users', 'auth_user'],
        data(){
            return{
                user: this.users.data,
                questions: this.users.data.questions,
                replies: this.users.data.replies
            }
        },

        methods:{
            logout() {
                axios.post('/logout').then(response => {
                    window.location = '/';
                })
            },
        },

        computed:{
            me(){
               if(this.auth_user){
                   return this.auth_user.id === this.user.id
               }
            },

            classes(){
                return '#icon-ava-' + this.user.name[0].toLowerCase()
            },
        }
    }
</script>

<style scoped>

</style>
