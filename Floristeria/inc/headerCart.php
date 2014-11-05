<header class="third-bg" role="heading" id="header">
    <div class="header-content container_9">
        <div class="quick-access"><ul>
                <li class="cart-icon"> <a href="/" title="View your Shopping cart"> <i class="icon-shopping-cart"></i> </a> <span ><?php echo Session::getItemsCount() ?> item(s) - <?php echo Session::getTotalPrice() ?>  &euro;</span>
                    <ul class="cart-items clearfix">
                        <?php
                        $cart = Session::getArraySession();
                        if ($cart !== null) {
                        foreach ($cart as $S_flower):
                        ?>
                        <li class = "item"> <a class = "closed" href = "product.php?id=' . $flower['id'] . '&m=1">X</a>
                            <div class = "item-thumbnail"> 
                                <a href = "./fichaflor.php?id=<?php $S_flower['id']; ?>" title = ""><img width = "89" height = "89" src = "media/top-cart-item.jpg"></a> 
                            </div>
                            <a href = "./fichaflor.php?id=<?php $S_flower['id']; ?>" class = "item-name"><?php echo $S_flower['title'] ?></a>
                            <div class = "info-item-cart"> <span class = "qount"><?php echo$S_flower['cant'] ?> X</span> <span class = "item-price"><span class = "price"><?php echo Session::priceFormat($flower['price']) ?>&nbsp;&euro;</span></span> </div>
                        </li>
                        <?php endforeach; ?>
                        <li class="footer-cart-items">
                            <div class="footer-totals"> <span>Total :</span> <span class="price"><?php echo Session::getTotalPrice() ?>&nbsp;&euro;</span></div>
                            <div class="footer-checkout">
                                <button class="btn btn-add"> Pasar por caja</button>
                            </div>
                        </li>
                        <?php
                        } else {
                            ?>
                            <li class = "item">
                                <div class = "item-thumbnail">       
                                </div>
                                <div class = "info-item-cart"></div>
                            </li>
                            <li class="footer-cart-items">
                                <p class="btn-add" style="margin:0">No hay productos</p>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- Mobile menu -->
    <!--
    <div class="dl-menuwrapper none" id="dl-menu">
        <button class="dl-trigger">Open Menu</button>
        <ul class="dl-menu">
            <li> <a href="#">Fashion</a>
                <ul class="dl-submenu"><li class="dl-back"><a href="#">back</a></li>
                    <li> <a href="#">Men</a>
                        <ul class="dl-submenu"><li class="dl-back"><a href="#">back</a></li>
                            <li><a href="product-grid.html">Shirts</a></li>
                            <li><a href="product-grid.html">Jackets</a></li>
                            <li><a href="product-grid.html">Chinos &amp; Trousers</a></li>
                            <li><a href="product-grid.html">Jeans</a></li>
                            <li><a href="product-grid.html">T-Shirts</a></li>
                            <li><a href="product-grid.html">Underwear</a></li>
                        </ul>
                    </li>
                    <li> <a href="#">Women</a>
                        <ul class="dl-submenu"><li class="dl-back"><a href="#">back</a></li>
                            <li><a href="product-grid.html">Jackets</a></li>
                            <li><a href="product-grid.html">Knits</a></li>
                            <li><a href="product-grid.html">Jeans</a></li>
                            <li><a href="product-grid.html">Dresses</a></li>
                            <li><a href="product-grid.html">Blouses</a></li>
                            <li><a href="product-grid.html">T-Shirts</a></li>
                            <li><a href="product-grid.html">Underwear</a></li>
                        </ul>
                    </li>
                    <li> <a href="#">Children</a>
                        <ul class="dl-submenu"><li class="dl-back"><a href="#">back</a></li>
                            <li><a href="product-grid.html">Boys</a></li>
                            <li><a href="product-grid.html">Girls</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li> <a href="#">Electronics</a>
                <ul class="dl-submenu"><li class="dl-back"><a href="#">back</a></li>
                    <li><a href="product-grid.html">Camera &amp; Photo</a></li>
                    <li><a href="product-grid.html">TV &amp; Home Cinema</a></li>
                    <li><a href="product-grid.html">Phones</a></li>
                    <li><a href="product-grid.html">PC &amp; Video Games</a></li>
                </ul>
            </li>
            <li> <a href="#">Furniture</a>
                <ul class="dl-submenu"><li class="dl-back"><a href="#">back</a></li>
                    <li> <a href="product-grid.html">Living Room</a>
                        <ul class="dl-submenu"><li class="dl-back"><a href="#">back</a></li>
                            <li><a href="product-grid.html">Sofas &amp; Loveseats</a></li>
                            <li><a href="product-grid.html">Coffee &amp; Accent Tables</a></li>
                            <li><a href="product-grid.html">Chairs &amp; Recliners</a></li>
                            <li><a href="product-grid.html">Bookshelves</a></li>
                        </ul>
                    </li>
                    <li> <a href="#">Bedroom</a>
                        <ul class="dl-submenu"><li class="dl-back"><a href="#">back</a></li>
                            <li> <a href="#">Beds</a>
                                <ul class="dl-submenu"><li class="dl-back"><a href="#">back</a></li>
                                    <li><a href="product-grid.html">Upholstered Beds</a></li>
                                    <li><a href="product-grid.html">Divans</a></li>
                                    <li><a href="product-grid.html">Metal Beds</a></li>
                                    <li><a href="product-grid.html">Storage Beds</a></li>
                                    <li><a href="product-grid.html">Wooden Beds</a></li>
                                    <li><a href="product-grid.html">Childrens Beds</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Bedroom Sets</a></li>
                            <li><a href="#">Chests &amp; Dressers</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Home Office</a></li>
                    <li><a href="#">Dining &amp; Bar</a></li>
                    <li><a href="#">Patio</a></li>
                </ul>
            </li>
            <li> <a href="#">Jewelry &amp; Watches</a>
                <ul class="dl-submenu"><li class="dl-back"><a href="#">back</a></li>
                    <li><a href="product-grid.html">Fine Jewelry</a></li>
                    <li><a href="product-grid.html">Fashion Jewelry</a></li>
                    <li><a href="product-grid.html">Watches</a></li>
                    <li> <a href="product-grid.html">Wedding Jewelry</a>
                        <ul class="dl-submenu"><li class="dl-back"><a href="#">back</a></li>
                            <li><a href="product-grid.html">Engagement Rings</a></li>
                            <li><a href="product-grid.html">Bridal Sets</a></li>
                            <li><a href="product-grid.html">Womens Wedding Bands</a></li>
                            <li><a href="product-grid.html">Mens Wedding Bands</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    -->
</header>
