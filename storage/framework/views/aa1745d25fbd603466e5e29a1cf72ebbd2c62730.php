<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered">
  <div class="navbar-vertical-container">
    <div class="navbar-vertical-footer-offset">
      <div class="navbar-brand-wrapper justify-content-between" style="background-color: #765341;">
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
      <div class="navbar-vertical-content">
        <ul class="navbar-nav navbar-nav-lg nav-tabs">
          <!-- Dashboards -->

          <!-- End Dashboards -->

          <!-- Pages -->
          <?php if(auth()->user()->hasPermissionTo("material.index") || auth()->user()->hasPermissionTo("sucursal.index")
          || auth()->user()->hasPermissionTo("bodega.index") || auth()->user()->hasPermissionTo("unidadmedida.index")
          || auth()->user()->hasPermissionTo("vehiculo.index") || auth()->user()->hasPermissionTo("cliente.index")
          || auth()->user()->hasPermissionTo("frecuencia.index") || auth()->user()->hasPermissionTo("chofer.index")
          || auth()->user()->hasPermissionTo("formapago.index")): ?>
            <li class="navbar-vertical-aside-has-menu ">
              <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Pages">
                <i class="tio-pages-outlined nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Catálogos</span>
              </a>

              <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                <?php if(auth()->user()->hasPermissionTo("material.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/material'); ?>" title="Welcome message" data-placement="left">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Materiales</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("sucursal.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/sucursal'); ?>" title="Welcome message" data-placement="left">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Sucursales</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("bodega.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/bodega'); ?>" title="Welcome message" data-placement="left">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Bodegas</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("bodega.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/bodegacompartida'); ?>" title="Welcome message" data-placement="left">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Bodegas Compartidas</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("unidadmedida.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/unidadmedida'); ?>" title="Welcome message" data-placement="left">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Unidad de medida</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("vehiculo.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/vehiculo'); ?>" title="Welcome message" data-placement="left">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Vehiculos</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("cliente.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/cliente'); ?>" title="Welcome message" data-placement="left">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Clientes</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("frecuencia.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/frecuencia'); ?>" title="Welcome message" data-placement="left">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Frecuencias</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("chofer.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/chofer'); ?>" title="Welcome message" data-placement="left">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Choferes</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("formapago.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo url('/formapago'); ?>" title="Welcome message" data-placement="left">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Formas de pago</span>
                    </a>
                  </li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>
          <!-- End Pages -->
          <?php if(auth()->user()->hasPermissionTo("convenio.index")): ?>
            <li class="nav-item ">
              <a class="js-nav-tooltip-link nav-link " href="<?php echo url('/convenio'); ?>" title="Welcome page" data-placement="left">
                <i class="tio-visible-outlined nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Convenios</span>
              </a>
            </li>
          <?php endif; ?>
          <!-- Logistica -->
          <?php if(auth()->user()->hasPermissionTo("rollogistica.index")): ?>
            <li class="navbar-vertical-aside-has-menu ">
              <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Apps">
                <i class="tio-apps nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Logistica de servicios</span>
              </a>

              <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                <!-- <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/rollogistica'); ?>" title="Kanban">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate">Recolecciones plantas</span>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/steprol'); ?>" title="File manager">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate">Recolecciones plantas</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/logisticaentrega'); ?>" title="File manager">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate">Almacenes salidas</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/logisticaespecial'); ?>" title="File manager">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate">Especiales extraordinarios</span>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>
          <!-- End Logistica -->
        
          <?php if(auth()->user()->hasPermissionTo("recoleccionrol.index")): ?>
            <!-- <li class="nav-item ">
              <a class="js-nav-tooltip-link nav-link " href="<?php echo url('/recoleccionrol'); ?>" title="Welcome page" data-placement="left">
                <i class="tio-visible-outlined nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Recolecciones planta</span>
              </a>
            </li> -->
          <?php endif; ?>
          
          <?php if(auth()->user()->hasPermissionTo("recoleccionsteprol.index")): ?>
            <li class="nav-item ">
              <a class="js-nav-tooltip-link nav-link " href="<?php echo url('/recoleccionsteprol'); ?>" title="Welcome page" data-placement="left">
                <i class="tio-visible-outlined nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Recolecciones planta</span>
              </a>
            </li>
            <?php endif; ?>
          
          <?php if(auth()->user()->hasPermissionTo("entradabodega.index")): ?>
            <li class="nav-item ">
              <a class="js-nav-tooltip-link nav-link " href="<?php echo url('/entradabodega'); ?>" title="Welcome page" data-placement="left">
                <i class="tio-visible-outlined nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Entrada Bodega</span>
              </a>
            </li>
          <?php endif; ?>
          <!-- <li class="nav-item ">
            <a class="js-nav-tooltip-link nav-link " href="<?php echo url('/finanzaentrada'); ?>" title="Welcome page" data-placement="left">
              <i class="tio-visible-outlined nav-icon"></i>
              <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Validación Finanzas</span>
            </a>
          </li> -->
          <?php if(auth()->user()->hasPermissionTo("ventadirecta.index")): ?>
            <li class="nav-item ">
              <a class="js-nav-tooltip-link nav-link " href="<?php echo url('/ventadirecta'); ?>" title="Welcome page" data-placement="left">
                <i class="tio-visible-outlined nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Venta directa</span>
              </a>
            </li>
          <?php endif; ?>
          <?php if(auth()->user()->hasPermissionTo("disposicionfinal.index")): ?>
            <li class="nav-item ">
              <a class="js-nav-tooltip-link nav-link " href="<?php echo url('/disposicionfinal'); ?>" title="Welcome page" data-placement="left">
                <i class="tio-visible-outlined nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Disposicion final</span>
              </a>
            </li>
          <?php endif; ?>
          <!-- Servicios -->
          <?php if(auth()->user()->hasPermissionTo("rolsegregacion.index") || auth()->user()->hasPermissionTo("roldestruccion.index")): ?>
            <li class="navbar-vertical-aside-has-menu ">
              <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Apps">
                <i class="tio-apps nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Servicios</span>
              </a>

              <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
              <?php if(auth()->user()->hasPermissionTo("rolsegregacion.index")): ?>
                <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/rolsegregacion'); ?>" title="Kanban">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate">Segregaciones</span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("roldestruccion.index")): ?>
                <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/roldestruccion'); ?>" title="File manager">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate">Destrucciones</span>
                  </a>
                </li>
              <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>
          <!-- End servicios -->
          <?php if(auth()->user()->hasPermissionTo("finanzaentrada.index") || auth()->user()->hasPermissionTo("validacionventadirecta.index")): ?>
            <li class="navbar-vertical-aside-has-menu ">
              <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Apps">
                <i class="tio-apps nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Validaciones</span>
              </a>
              <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
              <?php if(auth()->user()->hasPermissionTo("finanzaentrada.index")): ?>
                <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/finanzaentrada'); ?>" title="Kanban">
                    <span class="tio-visible-outlined nav-icon"></span>
                    <span class="text-truncate">Entradas almacen</span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("finanzaentrada.index")): ?>
                <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/validacionsegregacion'); ?>" title="Kanban">
                    <span class="tio-visible-outlined nav-icon"></span>
                    <span class="text-truncate">V. Segregaciones</span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("finanzaentrada.index")): ?>
                <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/validaciondestruccion'); ?>" title="Kanban">
                    <span class="tio-visible-outlined nav-icon"></span>
                    <span class="text-truncate">Destrucciones</span>
                  </a>
                </li>
              <?php endif; ?>
                <!-- <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/validacionsegregacion'); ?>" title="Kanban">
                    <span class="tio-visible-outlined nav-icon"></span>
                    <span class="text-truncate">Segregaciones</span>
                  </a>
                </li> -->
              
              <?php if(auth()->user()->hasPermissionTo("validacionventadirecta.index")): ?>
                <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/validacionventadirecta'); ?>" title="Kanban">
                    <span class="tio-visible-outlined nav-icon"></span>
                    <span class="text-truncate">Venta directa</span>
                  </a>
                </li>
              <?php endif; ?>
              <?php if(auth()->user()->hasPermissionTo("validaciondisposicionfinal.index")): ?>
                <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/validaciondisposicionfinal'); ?>" title="Kanban">
                    <span class="tio-visible-outlined nav-icon"></span>
                    <span class="text-truncate">Disposicion Final</span>
                  </a>
                </li>
              <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>
          <!-- Apps -->
          <?php if(auth()->user()->hasPermissionTo("entrada.index") || auth()->user()->hasPermissionTo("salida.index") ): ?>
            <li class="navbar-vertical-aside-has-menu ">
              <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Apps">
                <i class="tio-apps nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Almacen</span>
              </a>
              <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                <?php if(auth()->user()->hasPermissionTo("entrada.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/entrada'); ?>" title="Kanban">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Entradas</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("salida.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/salidadetalle'); ?>" title="File manager">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Salidas pendientes</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("salida.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/salidaregistrada'); ?>" title="File manager">
                      <span class="tio-circle nav-indicator-icon"></span>
                      <span class="text-truncate">Salidas registradas</span>
                    </a>
                  </li>
                <?php endif; ?>
                <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/transferencia'); ?>" title="File manager">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate">Transferencias</span>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>
          <!-- End Apps -->
          <?php if(auth()->user()->hasPermissionTo("rolcomprador.index")): ?>
            <li class="nav-item ">
              <a class="js-nav-tooltip-link nav-link " href="<?php echo url('/rolcomprador'); ?>" title="Welcome page" data-placement="left">
                <i class="tio-visible-outlined nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Programación de ventas <br>y destinos finales</span>
              </a>
            </li>
          <?php endif; ?>
          <?php if(auth()->user()->hasPermissionTo("comprador.index")): ?>
            <li class="nav-item ">
              <a class="js-nav-tooltip-link nav-link " href="<?php echo url('/comprador'); ?>" title="Welcome page" data-placement="left">
                <i class="tio-visible-outlined nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Recepción venta-cliente</span>
              </a>
            </li>
          <?php endif; ?>
          <?php if(auth()->user()->hasPermissionTo("cobro.index")): ?>
            <li class="navbar-vertical-aside-has-menu ">
              <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Cobros a compradores">
                <i class="tio-apps nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Cobros a compradores</span>
              </a>

              <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
              <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/cobro'); ?>" title="Cobros pendientes">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate">Pendientes</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="<?php echo url('/cobroregistrado'); ?>" title="Cobros registrados">
                    <span class="tio-circle nav-indicator-icon"></span>
                    <span class="text-truncate">Registrados</span>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>
          <?php if(auth()->user()->hasPermissionTo("consultainventario.index") || auth()->user()->hasPermissionTo("consultacuentacobrar.index") || auth()->user()->hasPermissionTo("consultacuentapagar.index") || auth()->user()->hasPermissionTo("consultarollogistica.index")): ?>
            <li class="navbar-vertical-aside-has-menu ">
              <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Apps">
                <i class="tio-apps nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Consultas</span>
              </a>
              <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                <?php if(auth()->user()->hasPermissionTo("consultarollogistica.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/consultarollogistica'); ?>" title="Kanban">
                      <span class="tio-visible-outlined nav-icon"></span>
                      <span class="text-truncate">Roles Logistica</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("consultainventario.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/consultainventario'); ?>" title="Kanban">
                      <span class="tio-visible-outlined nav-icon"></span>
                      <span class="text-truncate">Inventario</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("consultainventario.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/consultaentrada'); ?>" title="Kanban">
                      <span class="tio-visible-outlined nav-icon"></span>
                      <span class="text-truncate">Inventario <br>por fechas</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("consultacuentacobrar.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/consultacuentacobrar'); ?>" title="Kanban">
                      <span class="tio-visible-outlined nav-icon"></span>
                      <span class="text-truncate">Cuentas cobrar</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("consultacuentapagar.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/consultacuentapagar'); ?>" title="Kanban">
                      <span class="tio-visible-outlined nav-icon"></span>
                      <span class="text-truncate">Cuentas pagar</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("consultacobroventa.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/consultacobroventa'); ?>" title="Kanban">
                      <span class="tio-visible-outlined nav-icon"></span>
                      <span class="text-truncate">Cobros ventas</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("consultacobroventa.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/consultasegregacion'); ?>" title="Kanban">
                      <span class="tio-visible-outlined nav-icon"></span>
                      <span class="text-truncate">Segregaciones</span>
                    </a>
                  </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasPermissionTo("consultacobroventa.index")): ?>
                  <li class="nav-item">
                    <a class="nav-link " href="<?php echo url('/consultadestruccion'); ?>" title="Kanban">
                      <span class="tio-visible-outlined nav-icon"></span>
                      <span class="text-truncate">Destrucciones</span>
                    </a>
                  </li>
                <?php endif; ?>
              </ul>
            </li>          
          <?php endif; ?>
          <!-- Authentication -->

          <!-- End Authentication -->

          <li class="nav-item">
            <div class="nav-divider"></div>
          </li>
          <?php if(auth()->user()->hasPermissionTo("usuario.index")): ?>
          <!-- Admin -->
            <li class="navbar-vertical-aside-has-menu ">
              <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Apps">
                <i class="tio-apps nav-icon"></i>
                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Administración</span>
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
          <?php endif; ?>
          <!-- End Admin -->

          <li class="nav-item">
            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
          </li>
        </ul>
      </div>
      <!-- End Content -->
    </div>
  </div>
</aside>
<?php /**PATH C:\xampp\htdocs\mi-proyecto-laravel\resources\views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>