@extends('layout')

@section('content')

<div class="content-inner">
<div id="email-sidebar">
    <!-- Start #email-sidebar -->
    <div class="p15">
        <a id="write-email" href="email-write.html" class="btn btn-danger btn-block uppercase">compose</a>
    </div>
    <ul id="email-nav" class="nav nav-pills nav-stacked">
        <li><a href="email-inbox.html"><i class="fa fa-archive"></i> Inbox <span class="label label-teal">27</span></a>
        </li>
        <li><a href="#"><i class="fa fa-star"></i> Starred <span class="label label-warning">2</span></a>
        </li>
        <li><a href="#"><i class="im-info"></i> Important <span class="label label-danger">5</span></a>
        </li>
        <li><a href="#"><i class="fa fa-location-arrow"></i> Send <span class="label label-success">14</span></a>
        </li>
        <li><a href="#"><i class="im-pencil5"></i> Drafts <span class="label label-brown">1</span></a>
        </li>
        <li><a href="#"><i class="fa fa-trash-o"></i> Trash <span class="label label-dark">3</span></a>
        </li>
        <li class="nav-header">Labels</li>
        <li><a href="#"><span class="circle"></span> Work</a>
        </li>
        <li><a href="#"><span class="circle color-red"></span> Private</a>
        </li>
        <li><a href="#"><span class="circle color-green"></span> Travel</a>
        </li>
        <li><a href="#"><span class="circle color-pink"></span> Promotions</a>
        </li>
        <li><a href="#"><span class="circle color-teal"></span> Updates</a>
        </li>
    </ul>
</div>
<!--End #email-sidebar -->
<div id="email-content">
<!-- Start #email-content -->
<div class="email-wrapper">
<div class="email-toolbar col-lg-12">
    <div class="pull-left" role="toolbar">
        <button id="email-toggle" class="email-toggle" type="button">
            <span class="sr-only">Toggle email nav</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="#" class="btn btn-default btn-round btn-sm tip mr5" title="Refresh inbox"><i
                class="fa fa-refresh s16"></i></a>
        <a href="#" class="btn btn-default btn-round btn-sm tip mr5" title="Reply"><i class="im-undo2 s16"></i></a>
        <a href="#" class="btn btn-default btn-round btn-sm tip mr5" title="Forward"><i class="im-redo2 s16"></i></a>
        <a href="#" class="btn btn-danger btn-round btn-sm tip mr5" title="Delete"><i class="fa fa-trash-o s16"></i></a>
        <a href="#" class="btn btn-default btn-round btn-sm tip mr5" title="Print"><i class="im-print3 s16"></i></a>
    </div>
    <ul class="email-pager">
        <li class="pager-info">1-20 of 345</li>
        <li><a href="#" class="btn btn-default btn-round btn-sm"><i class="fa fa-angle-left s16"></i></a>
        </li>
        <li><a href="#" class="btn btn-default btn-round btn-sm"><i class="fa fa-angle-right s16"></i></a>
        </li>
    </ul>
</div>
<div class="email-toolbar-search col-lg-12">
    <form>
        <input type="text" class="form-control input-xlarge" name="search" placeholder="Search for email ...">
    </form>
</div>
<div class="email-list col-lg-12">
<table class="table table-striped table-hover table-fixed-layout non-responsive">
<tbody>
<tr>
    <td class="email-select input-mini">
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">Twitter</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-teal mr10">Updates</span> SuggeElson, check out your week on Twitter.
            <span class="text-muted small ml10">SuggeElson see your week in review. Theese tweets help you to make connections...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 28</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">FC Barcelona Fans</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-pink mr10">Promotions</span> Tito, eternaly remembered
            <span class="text-muted small ml10">Barca fans mobile view as web page...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 28</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">ADATA</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            A sense of speed you can't even begin to imagine
            <span class="text-muted small ml10">If you unable to see this message please click bellow ...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 27</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">Monitor.US</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-teal mr10">Updates</span> Daily_Report1 - Daily Report Apr 26, 2014
            <span class="text-muted small ml10">Uptime monior, monitor location, All Test name ...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 27</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">service@intl.paypal.com</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-teal mr10">Updates</span> Receipt for Your Payment to Digital Ocean, Inc.
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 26</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">Jonh Stanton</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-primary mr10">Work</span> SuggeElson, please come to office tomorrow.
            <span class="text-muted small ml10">We need to discus the new project  ...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 27</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">Golden Sans Holiday</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-success mr10">Travel</span> Your trip to spain is arranged successful.
            <span class="text-muted small ml10">You will enjoy the trip to Barcelona, Spain  ...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 25</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">me, Girlfriend <span class="count-msg">(2)</span></a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-danger mr10">Private</span> Please check out this new house is awesome.
            <span class="text-muted small ml10">Will be nice to move in, he has big pool  ...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 25</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">Support, me <span class="count-msg">(17)</span></a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-primary mr10">Work</span> The progress bar now work correctly.
            <span class="text-muted small ml10">I extract the files you send me and now all is good ...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 24</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">support</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-teal mr10">Updates</span> You sold a item !
            <span class="text-muted small ml10">Congratulations, you sold the following item - Supr Responsive admin template</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 24</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">Twitter</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-teal mr10">Updates</span> SuggeElson, check out your week on Twitter.
            <span class="text-muted small ml10">SuggeElson see your week in review. Theese tweets help you to make connections...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 23</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">FC Barcelona Fans</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-pink mr10">Promotions</span> Tito, eternaly remembered
            <span class="text-muted small ml10">Barca fans mobile view as web page...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 23</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">ADATA</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            A sense of speed you can't even begin to imagine
            <span class="text-muted small ml10">If you unable to see this message please click bellow ...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 22</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">Monitor.US</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-teal mr10">Updates</span> Daily_Report1 - Daily Report Apr 26, 2014
            <span class="text-muted small ml10">Uptime monior, monitor location, All Test name ...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 22</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">service@intl.paypal.com</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-teal mr10">Updates</span> Receipt for Your Payment to Digital Ocean, Inc.
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 22</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">Jonh Stanton</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-primary mr10">Work</span> SuggeElson, please come to office tomorrow.
            <span class="text-muted small ml10">We need to discus the new project  ...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 21</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">Golden Sans Holiday</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-success mr10">Travel</span> Your trip to spain is arranged successful.
            <span class="text-muted small ml10">You will enjoy the trip to Barcelona, Spain  ...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 21</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">me, Girlfriend <span class="count-msg">(2)</span></a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-danger mr10">Private</span> Please check out this new house is awesome.
            <span class="text-muted small ml10">Will be nice to move in, he has big pool  ...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 21</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">Support, me <span class="count-msg">(17)</span></a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-primary mr10">Work</span> The progress bar now work correctly.
            <span class="text-muted small ml10">I extract the files you send me and now all is good ...</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 20</td>
</tr>
<tr>
    <td>
        <label class="checkbox">
            <input class="check" type="checkbox" value="option3">
        </label>
    </td>
    <td class="email-star input-mini"><i class="im-star s20"></i>
    </td>
    <td class="email-subject"><a href="email-read.html">support</a>
    </td>
    <td class="email-intro">
        <a href="email-read.html">
            <span class="label label-teal mr10">Updates</span> You sold a item !
            <span class="text-muted small ml10">Congratulations, you sold the following item - Supr Responsive admin template</span>
        </a>
    </td>
    <td class="email-date text-right input-mini">Apr 20</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<!--End #email-content -->
</div>
<div class="clearfix"></div>
@overwrite