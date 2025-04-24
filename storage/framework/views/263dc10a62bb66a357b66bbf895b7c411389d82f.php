<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered">
    <div class="navbar-vertical-container"  style="background-color: #8c8c8c;">
      <div class="navbar-vertical-footer-offset" >
        <div class="navbar-brand-wrapper justify-content-between" style="background-color: #ffffff;">
          <!-- Logo -->
  
  
            <a class="navbar-brand" href="<?php echo route('home'); ?>" aria-label="Front">
              <img class="navbar-brand-logo" src="<?php echo asset('/img/logo.png'); ?>" alt="Logo">
              <img class="navbar-brand-logo-mini" src="<?php echo asset('/img/logo.png'); ?>" alt="Logo">
            </a>
  
          <!-- End Logo -->
  
          <!-- Navbar Vertical Toggle -->
          <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
            <i class="tio-clear tio-lg"></i>
          </button>
          <!-- End Navbar Vertical Toggle -->
        </div>
  
        <!-- Content -->
        <div class="navbar-vertical-content"  >
          <ul class="navbar-nav navbar-nav-lg nav-tabs">
            <!-- Dashboards -->
  
            <!-- End Dashboards -->
              <!-- Pages -->
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
            <li class="nav-item">
              <div class="nav-divider"></div>
            </li>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                <i class="tio-apps nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Catalogos</span>
                </a>
                <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                 <li class="nav-item">
                   <a class="nav-link" href="<?php echo url('/parametros'); ?>" title="Welcome message" data-placement="left">
                     <span class="tio-circle nav-indicator-icon"></span>
                     <span class="text-truncate">Parametros</span>
                   </a>
                 </li>
             </ul>
                <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/puestos'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Puestos</span>
                      </a>
                    </li>
                </ul>
               
              </li>
        <?php endif; ?>
          <!-- End Pages -->
          <li class="nav-item">
              <div class="nav-divider"></div>
            </li>
            <!-- Pages -->
            <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Almacen MP</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
            <?php endif; ?>
            <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Almacen PT</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Calidad</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Compras</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Contabilidad</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Corte</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Costos</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Customer</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Desarrollo de Productos</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Diseño</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Empaque</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Estructuras</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Ingenieria</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Laboratorio</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Mantenimiento</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Mecatronica</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Mejora Continua</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Metodos Proce</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
            <?php if(auth()->user()->hasRole("Jefe Administrativo") ): ?>
            
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Incidencias</span>
                </a>
  
                <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/vacaciones'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Faltas Justificadas</span>
                      </a>
                    </li>
                
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/vacaciones'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Incapacidades</span>
                      </a>
                    </li>
                
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/vacaciones'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Permisos</span>
                      </a>
                    </li>
                
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/vacaciones'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Retardos</span>
                      </a>
                    </li>
  
  
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/vacaciones'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Tiempo Extra</span>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/vacaciones.solicitarvacaciones'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Solicitud de Vacaciones</span>
                      </a>
                    </li>
  
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/vacaciones'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Vacaciones</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/consultavacaciones'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Vacaciones Autorizadas</span>
                      </a>
                    </li>

                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("vacaciones.solicitarvacaciones") && !auth()->user()->hasPermissionTo("usuario.index")): ?>
              
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/vacaciones.solicitarvacaciones'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Solicitud de Vacaciones</span>
                      </a>
                    </li>
                    <?php if(auth()->user()->hasRole("Team Leader") ): ?> 
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/vacaciones'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Vacaciones Modulo</span>
                      </a>
                    </li>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasRole("Team Leader") ): ?>)
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo url('/consultavacaciones'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Vacaciones Autorizadas</span>
                      </a>
                    </li>
                    <?php endif; ?>
                <?php endif; ?>
               <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Produccion</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Planeacion</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Reclutamiento</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Recursos Humanos</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Screen Printing</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Seguridad</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Sistemas</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.notificacion")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Trafico</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
              <li class="navbar-vertical-aside-has-menu " >
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                  <i class="tio-pages-outlined nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Ventas</span>
                </a>
  
                 <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                 
                  
                </ul>
              </li>
  <?php endif; ?>
  <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
            <!-- End Pages -->
            <li class="nav-item">
              <div class="nav-divider"></div>
            </li>
  
            <!-- Admin -->
              <li class="navbar-vertical-aside-has-menu ">
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Apps">
                  <i class="tio-apps nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Admón Accesos</span>
                </a>
  
                <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/permiso'); ?>" title="Kanban">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Permisos</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/role'); ?>" title="File manager">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Roles</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/acceso'); ?>" title="File manager">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Accesos</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/usuario'); ?>" title="File manager">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Usuarios</span>
                    </a>
                  </li>
                  
  
                </ul>
              </li>
            <!-- End Admin -->
             <!-- Admin -->
             <li class="navbar-vertical-aside-has-menu ">
                <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Apps">
                  <i class="tio-apps nav-icon"></i>
                  <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Admón Autorización</span>
                </a>
  
                <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/incidencia'); ?>" title="Kanban">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Incidencias</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/responsables'); ?>" title="File manager">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Responsables</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/autorizacion'); ?>" title="File manager">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Autorización</span>
                    </a>
                  </li>              
  
                </ul>
              </li>
            <!-- End Admin -->
            <li class="nav-item">
              <div class="nav-divider"></div>
            </li>
           <?php endif; ?>
  
            <li class="nav-item">
              <small class="tio-more-horizontal nav-subtitle-replacer"></small>
            </li>
          </ul>
        </div>
        <!-- End Content -->
      </div>
    </div>
  </aside>
  <?php /**PATH E:\xampp1\htdocs\intimark_sia\resources\views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>