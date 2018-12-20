       <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="<?=base_url();?>plantilla/panel/#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="<?=base_url();?>plantilla/panel/#">
                      <div class="pull-left">
                        <!-- User Image -->
                       <?php if($user->foto==''){ ?>
            <img src="<?=base_url();?>plantilla/panel/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
           <?php }else{ ?>
            <img src="<?=base_url().$user->foto;?>" class="img-circle" alt="User Image">
           <?php } ?>
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="<?=base_url();?>plantilla/panel/#">See All Messages</a></li>
            </ul>
          </li>







           <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="<?=base_url();?>plantilla/panel/#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="<?=base_url();?>plantilla/panel/#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="<?=base_url();?>plantilla/panel/#">View all</a></li>
            </ul>
          </li>