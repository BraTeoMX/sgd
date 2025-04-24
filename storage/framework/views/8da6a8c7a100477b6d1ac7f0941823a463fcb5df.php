<aside
    class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered">
    <div class="navbar-vertical-container" style="background-color: #8c8c8c;">
        <div class="navbar-vertical-footer-offset">
            <div class="navbar-brand-wrapper justify-content-between" style="background-color: #ffffff;">
                <!-- Logo -->


                <a class="navbar-brand" href="<?php echo route('home'); ?>" aria-label="Front">
                    <img class="navbar-brand-logo" src="<?php echo asset('/img/logo.png'); ?>" alt="Logo">
                    <img class="navbar-brand-logo-mini" src="<?php echo asset('/img/logo.png'); ?>" alt="Logo">
                </a>

                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button"
                    class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                    <i class="tio-clear tio-lg"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->
            </div>

            <!-- Content -->
            <div class="navbar-vertical-content" style="background-color: #efebe9;">
                <ul class="navbar-nav navbar-nav-lg nav-tabs">
                    <!-- Dashboards -->

                    <!-- End Dashboards -->
                    <!-- Pages -->

                    <!-- End Pages -->
                    <!--<li class="nav-item">
              <div class="nav-divider"></div>
            </li>-->
                    <!-- Pages -->
                <?php if (! (auth()->user()->email == 'simulacro@gmail.com')): ?>
                    <?php if(auth()->user()->hasPermissionTo('vacaciones.solicitarvacaciones')): ?>
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;"
                                title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Vacaciones</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <?php if(!auth()->user()->hasRole('Vicepresidente')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/vacaciones.solicitarvacaciones'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Solicitud </span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Team Leader') ||
                                        auth()->user()->hasRole('Gerente Produccion') ||
                                        auth()->user()->hasRole('Coordinador/Analista') ||
                                        auth()->user()->hasRole('Seguridad e Higiene') ||
                                        auth()->user()->hasRole('Vicepresidente')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/vacaciones'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Personal de Area</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Jefe Administrativo') ||
                                        auth()->user()->hasRole('Vicepresidente') ||
                                        auth()->user()->hasRole('Team Leader') ||
                                        auth()->user()->hasRole('Gerente Produccion')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/vacaciones.form2'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Autorizar</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Administrador Sistema')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/vacaciones.cancelacion'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Cancelación</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/vacaciones.saldo'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Saldo de dias</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Team Leader') ||
                                        auth()->user()->hasRole('Coordinador/Analista') ||
                                        auth()->user()->hasRole('Seguridad e Higiene') ||auth()->user()->hasRole('Administrador Sistema')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/estatusvacaciones'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Estatus de Solicitud</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Jefe Administrativo') ||
                                        auth()->user()->hasRole('Gerente Produccion') ||
                                        auth()->user()->hasRole('Vicepresidente') ||
                                        auth()->user()->hasRole('Seguridad e Higiene') ||
                                        auth()->user()->hasRole('Nominas PII') ||
                                        auth()->user()->hasRole('Administrador Sistema')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/consultavacaciones'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Reporte General</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Vicepresidente')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/vacaciones'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Excepciones</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Vicepresidente') ||
                                        auth()->user()->hasRole('Administrador Sistema')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/consultaexcepciones'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Reporte Excepciones</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Administrador Sistema')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/vacaciones.masivas'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Vacaciones Masivas</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Administrador Sistema')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo url('/vacaciones.solicitarvacaciones2023'); ?>" title="Welcome message"
                                        data-placement="left">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Solicitud2023 </span>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>

                    <?php endif; ?>
                <?php endif; ?>



                    <?php if(auth()->user()->hasPermissionTo('formatopermisos.solicitar')): ?>
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "
                                href="javascript:;" title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Permisos</span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <!-- <li class="nav-item">
                     <a class="nav-link" href="<?php echo url('/formatopermisos.solicitar'); ?>" title="Welcome message" data-placement="left">
                        <span class="tio-circle nav-indicator-icon"></span>
                        <span class="text-truncate">Solicitud</span>
                      </a>
                    </li> -->

                                <?php if(auth()->user()->hasRole('Analista/Coordinador') ||
                                        auth()->user()->hasRole('Gerente Produccion') ||
                                        auth()->user()->hasRole('Jefe Administrativo') ||
                                        auth()->user()->hasRole('Coordinador/Analista') ||
                                        auth()->user()->hasRole('Seguridad e Higiene') ||
                                        auth()->user()->hasRole('Administrador Sistema') ||
                                        auth()->user()->hasRole('Vicepresidente') ||
                                        auth()->user()->hasRole('Servicio Medico')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/formatopermisos'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Solicitud</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Team Leader') ||
                                        auth()->user()->hasRole('Vicepresidente')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/formatopermisos.form2'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Autorizar</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!auth()->user()->hasRole('Vigilancia')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/estatuspermisos'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Estatus de Solicitud</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Gerente Produccion') ||
                                        auth()->user()->hasRole('Jefe Administrativo') ||
                                        auth()->user()->hasRole('Vicepresidente')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/formatopermisos.excepcion'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Excepciones</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Administrador Sistema')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('formatopermisos.pabiertosinicio'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Permisos Abiertos</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(!auth()->user()->hasRole('Vigilancia')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/consultapermisos'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Reporte General</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Vigilancia') ||
                                        auth()->user()->hasRole('Administrador Sistema')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/formatopermisos.seguridad'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Revision Seguridad</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('Administrador Sistema') || auth()->user()->hasRole('Coordinador/Analista')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo url('/permisos.masivos'); ?>" title="Welcome message"
                                        data-placement="left">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Permisos Masivos</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            </ul>
                    <?php endif; ?>

                    <?php if(auth()->user()->hasRole('Vigilancia') ||
                            auth()->user()->hasRole('Administrador Sistema')): ?>
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "
                                href="javascript:;" title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Retardos
                                </span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo url('/retardos'); ?>" title="Welcome message"
                                        data-placement="left">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Retardos</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasPermissionTo('faltasjustificadas.nuevoarchivo')): ?>
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "
                                href="javascript:;" title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Faltas
                                    Justificadas</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo url('/faltasjustificadas'); ?>" title="Welcome message"
                                        data-placement="left">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Registrar Justificantes</span>
                                    </a>
                                </li>

                            </ul>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo url('/faltasjustificadas.reporte'); ?>" title="Welcome message"
                                        data-placement="left">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Reporte General</span>
                                    </a>
                                </li>

                            </ul>

                        </li>
                    <?php endif; ?>

                    <?php if(auth()->user()->hasRole('Servicio Medico') ||
                            auth()->user()->hasRole('Recursos Humanos') ||
                            auth()->user()->hasRole('Administrador Sistema')||
                            auth()->user()->hasRole('Coordinador/Analista') ||
                                        auth()->user()->hasRole('Gerente Produccion')): ?>
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "
                                href="javascript:;" title="Pages">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Incapacidades
                                </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <?php if(auth()->user()->hasRole('Servicio Medico')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/incapacidades'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Registrar Incapacidades</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <?php if(auth()->user()->hasRole('Administrador Sistema') ||
                                        auth()->user()->hasRole('Servicio Medico') ||
                                        auth()->user()->hasRole('Recursos Humanos') ||
                                        auth()->user()->hasRole('Coordinador/Analista')||
                                        auth()->user()->hasRole('Gerente Produccion')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo url('/incapacidades.reporte'); ?>" title="Welcome message"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Reporte General</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
<!--
                    <?php if((auth()->user()->email=='atapia@intimark.com.mx' ||
                     auth()->user()->email=='msalazar@intimark.com.mx' ||
                      auth()->user()->email=='gvergara@intimark.com.mx' ||
                      auth()->user()->email=='bteofilo@intimark.com.mx' ||
                      auth()->user()->email=='seguridadpii@intimark.com.mx' ||
                      auth()->user()->email=='seguridadpi@intimark.com.mx' ||
                      auth()->user()->email=='ilopez@intimark.com.mx' || auth()->user()->email=='cproyectos@intimark.com.mx' || auth()->user()->email=='ggonzalez@intimark.com.mx' ||
                      auth()->user()->email=='coordinadorreclutamientosb@intimark.com.mx' || auth()->user()->email=='rhumanospII@intimark.com.mx' || auth()->user()->email=='rmoreno@intimark.com.mx' ||
                      auth()->user()->email=='simulacro@gmail.com' ||
                      auth()->user()->email=='lsanchez@intimark.com.mx' || auth()->user()->email== 'gvm7506@gmail.com'	)): ?>
                    <li class="navbar-vertical-aside-has-menu">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "
                            href="javascript:;" title="Eventos">
                            <i class="tio-pages-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Eventos</span>
                        </a>

                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <?php if(auth()->user()->hasRole('Seguridad e Higiene') ||
                            auth()->user()->hasRole('Administrador Sistema') ||  auth()->user()->hasRole('Jefe Administrativo') ): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('eventos.create')); ?>" title="Crear Evento"
                                        data-placement="left">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Nuevo Evento</span>
                                    </a>
                                </li>
                             <?php endif; ?>
                        </ul>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                               <a class="nav-link" href="<?php echo e(route('eventos.PreRegistro')); ?>" title="Lista para Registro" data-placement="left">
                                    <i class="tio-circle nav-indicator-icon"></i>
                                    <span class="text-truncate">Registro de Evento</span>
                                </a>
                            </li>
                        </ul>

                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                               <a class="nav-link" href="<?php echo e(route('eventos.RegistroAsistencias')); ?>" title="Lista para PreRegistro" data-placement="left">
                                    <i class="tio-circle nav-indicator-icon"></i>
                                    <span class="text-truncate">Asistencia con Registro</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('eventos.ListaEventos')); ?>" title="Lista de Eventos" data-placement="left">
                                            <i class="tio-circle nav-indicator-icon"></i>
                                            <span class="text-truncate">Asistencia sin Registro</span>
                                        </a>
                                    </li>
                        </ul>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('eventos.ReportesEventos')); ?>" title="Reporte Eventos"
                                    data-placement="left">
                                    <i class="tio-circle nav-indicator-icon"></i>
                                    <span class="text-truncate">Reporte Eventos</span>
                                </a>
                            </li>
                        </ul>
                         
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('eventos.VistaPapel')); ?>" title="Registro Papel"
                                    data-placement="left">
                                    <i class="tio-circle nav-indicator-icon"></i>
                                    <span class="text-truncate">Papel </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('eventos.simulacro')); ?>" title="Registros simulacro"
                                    data-placement="left">
                                    <i class="tio-circle nav-indicator-icon"></i>
                                    <span class="text-truncate">Simulacro </span>
                                </a>
                            </li>
                        </ul>
                        
                    </li>
                    <?php endif; ?> -->
                    <?php if((auth()->user()->email=='atapia@intimark.com.mx' ||
                        auth()->user()->email=='msalazar@intimark.com.mx' ||
                        auth()->user()->email=='jcapacitacion@intimark.com.mx' ||
                        auth()->user()->email=='gvergara@intimark.com.mx' ||
                        auth()->user()->email=='bteofilo@intimark.com.mx' ||
                        auth()->user()->email=='seguridadpii@intimark.com.mx' ||
                        auth()->user()->email=='seguridadpi@intimark.com.mx' ||
                        auth()->user()->email=='ilopez@intimark.com.mx' || auth()->user()->email=='cproyectos@intimark.com.mx' || auth()->user()->email=='ggonzalez@intimark.com.mx' ||
                        auth()->user()->email=='coordinadorreclutamientosb@intimark.com.mx' || auth()->user()->email=='rhumanospII@intimark.com.mx' || auth()->user()->email=='rmoreno@intimark.com.mx' ||
                        auth()->user()->email=='lsanchez@intimark.com.mx' || auth()->user()->email== 'gvm7506@gmail.com'|| auth()->user()->email== 'rhuitron@intimark.com.mx'	)): ?>
                        <li class="navbar-vertical-aside-has-menu">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "
                                href="javascript:;" title="Eventos V2">
                                <i class="tio-pages-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Eventos V2</span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <?php if(auth()->user()->hasRole('Seguridad e Higiene') ||
                                auth()->user()->hasRole('Administrador Sistema') ||  auth()->user()->hasRole('Jefe Administrativo') || auth()->user()->email=='bteofilo@intimark.com.mx' ): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('eventosActualizacion.inicioEvento')); ?>" title="Crear Evento"
                                            data-placement="left">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Crear Evento</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('eventosActualizacion.registroAsistenciaConRegistro')); ?>" title="Pre-Registro de Asistencia" data-placement="left">
                                        <i class="tio-circle nav-indicator-icon"></i>
                                        <span class="text-truncate">Pre-Registro de Asistencia</span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('eventosActualizacion.asistenciaConRegistroConfirmacion')); ?>" title="Confirmar Asistencia" data-placement="left">
                                        <i class="tio-circle nav-indicator-icon"></i>
                                        <span class="text-truncate">Confirmar Asistencia</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo e(route('eventosActualizacion.registroAsistencia')); ?>" title="Asistencia sin Registro" data-placement="left">
                                                <i class="tio-circle nav-indicator-icon"></i>
                                                <span class="text-truncate">Asistencia sin Registro</span>
                                            </a>
                                        </li>
                            </ul>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('eventosActualizacion.reporteEvento')); ?>" title="Reporte Eventos"
                                        data-placement="left">
                                        <i class="tio-circle nav-indicator-icon"></i>
                                        <span class="text-truncate">Reporte Eventos</span>
                                    </a>
                                </li>
                            </ul>
                            <?php if(auth()->user()->hasRole('Seguridad e Higiene') || auth()->user()->email=='bteofilo@intimark.com.mx'|| auth()->user()->email=='adejesus@intimark.com.mx'|| auth()->user()->email=='gvm7506@gmail.com' ): ?>
                                
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('eventos.VistaPapel')); ?>" title="Reporte Papel"
                                            data-placement="left">
                                            <i class="tio-circle nav-indicator-icon"></i>
                                            <span class="text-truncate">Papel </span>
                                        </a>
                                    </li>
                                </ul>
                                
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('eventos.simulacro')); ?>" title="Registros simulacro"
                                            data-placement="left">
                                            <i class="tio-circle nav-indicator-icon"></i>
                                            <span class="text-truncate">Simulacro </span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(route('eventos.ReportesEventos')); ?>" title="Reporte Eventos"
                                            data-placement="left">
                                            <i class="tio-circle nav-indicator-icon"></i>
                                            <span class="text-truncate">Reporte Papel/Simulacro</span>
                                        </a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>

                    <?php if(auth()->user()->hasRole('Administrador Sistema')): ?>
                    <li class="navbar-vertical-aside-has-menu ">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "
                            href="javascript:;" title="Pages">
                            <i class="tio-pages-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Ausentismo
                            </span>
                        </a>
                       <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo url('/ausentismo.reporte'); ?>" title="Welcome message"
                                        data-placement="left">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Reporte </span>
                                    </a>
                                </li>
                        </ul>
                    </li>
                <?php endif; ?>

                    <?php if(auth()->user()->hasPermissionTo('usuario.index')): ?>
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "
                                href="javascript:;" title="Pages">
                                <i class="tio-apps nav-icon"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Catalogos</span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo url('/parametros'); ?>" title="Welcome message"
                                        data-placement="left">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Parametros</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo url('/puestos'); ?>" title="Welcome message"
                                        data-placement="left">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Puestos</span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo url('/calendario'); ?>" title="Welcome message"
                                        data-placement="left">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Calendario</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo url('/saldovacaciones'); ?>" title="Welcome message"
                                        data-placement="left">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Saldo de Vacaciones</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo url('/asisweb'); ?>" title="Welcome message"
                                        data-placement="left">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Asisweb</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <?php if(auth()->user()->hasPermissionTo('usuario.index') || auth()->user()->email=='bteofilo@intimark.com.mx' ): ?>
                        <!-- End Pages -->

                        <!-- Admin -->
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "
                                href="javascript:;" title="Apps">
                                <i class="tio-apps nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Admón
                                    Accesos</span>
                            </a>

                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                                <?php if(auth()->user()->hasPermissionTo('permiso.index') &&
                                        auth()->user()->hasRole('Administrador') || auth()->user()->email=='bteofilo@intimark.com.mx'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?php echo url('/permiso'); ?>" title="Kanban">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Permisos</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasPermissionTo('role.index') &&
                                        auth()->user()->hasRole('Administrador')
                                        || auth()->user()->email=='bteofilo@intimark.com.mx'): ?>
                                    <li class="nav-item">
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?php echo url('/role'); ?>" title="File manager">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Roles</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasPermissionTo('acceso.index') &&
                                        auth()->user()->hasRole('Administrador')
                                        || auth()->user()->email=='bteofilo@intimark.com.mx'): ?>
                                    <li class="nav-item">
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?php echo url('/acceso'); ?>" title="File manager">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Accesos</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasPermissionTo('usuario.index') || auth()->user()->email=='bteofilo@intimark.com.mx'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link " href="<?php echo url('/usuario'); ?>" title="File manager">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">Usuarios</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </li>
                        <!-- End Admin -->
                        <!-- Admin -->
                        <li class="navbar-vertical-aside-has-menu ">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle "
                                href="javascript:;" title="Apps">
                                <i class="tio-apps nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Admón
                                    Autorización</span>
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
                                        <span class="text-truncate">Matriz Permisos</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="<?php echo url('/matrizautorizacion'); ?>" title="File manager">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">Matriz Autorizaciones</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <!-- End Admin -->

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
<?php /**PATH E:\xampp1\htdocs\intimark_sgd\resources\views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>