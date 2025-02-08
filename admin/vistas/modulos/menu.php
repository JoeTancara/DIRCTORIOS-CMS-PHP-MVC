  <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
              <div class="pull-left image">
                  <img src="<?php echo $admin["foto"] ?>" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                  <p><?php echo $admin["nombre"] ?></p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                              class="fa fa-search"></i>
                      </button>
                  </span>
              </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>

              <li>
                  <a href="http://localhost/DIRECTORIO_CMS/" target="_blank">
                      <i class="fas fa-globe"></i></i> <span>VER SITIO</span>
                      <span class="pull-right-container">
                          <small class="label pull-right bg-green">new</small>
                      </span>
                  </a>
              </li>

              <li>
                  <a href="grupos">
                      <i class="fas fa-link"></i> <span>Grupos</span>
                      <span class="pull-right-container">
                          <small class="label pull-right bg-green">new</small>
                      </span>
                  </a>
              </li>

              <li>
                  <a href="perfiles">
                      <i class="fas fa-user-friends"></i> <span>Perfiles</span>
                      <span class="pull-right-container">
                          <small class="label pull-right bg-green">new</small>
                      </span>
                  </a>
              </li>

              <li>
                  <a href="categorias">
                      <i class="fa fa-th"></i> <span>Categorias</span>
                      <span class="pull-right-container">
                          <small class="label pull-right bg-green">new</small>
                      </span>
                  </a>
              </li>

              <li>
                  <a href="anuncios">
                      <i class="fas fa-laptop-code"></i> <span>Anuncios</span>
                      <span class="pull-right-container">
                          <small class="label pull-right bg-green">new</small>
                      </span>
                  </a>
              </li>











          </ul>
      </section>
      <!-- /.sidebar -->
  </aside>