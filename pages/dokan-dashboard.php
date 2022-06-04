<?php //Template Name: Dokan Dashboard 
?>
<?php get_header(); ?>
<div class="dokan_page dokan_dashboard">
    <div class="container">
        <div class="head-banner" style="background-image: url(https://ecotech-vendor.kutethemes.net/wp-content/uploads/2021/01/Head-banner.jpg);">
            <div class="container">
                <div class="inner">
                    <h1 class="page-title entry-title">
                        <span>Dashboard</span>
                    </h1>
                    <nav role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="trail-item trail-begin"><a href="https://ecotech-vendor.kutethemes.net/" rel="home" itemprop="item"><span itemprop="name">Home</span></a>
                                <meta itemprop="position" content="1">
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="trail-item trail-end"><span itemprop="name">Dashboard</span>
                                <meta itemprop="position" content="2">
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div id="primary" class="content-area">
            <div class="dokan-dashboard-wrap">
                <?php echo do_shortcode('[dokan-dashboard]'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>