


    
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                         <div class="header">
                            <h2>
                                <?= $judul ?>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="body">
                        <?php echo form_open('users/users_update/'.$users['users_id']); ?>
                           <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="users_nama" required="required" value="<?php echo $users['users_nama'];  ?>">

                                        <label class="form-label">NAMA</label>
                                    </div>
                            </div>

                            <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="users_tingcode" required="required" value="<?php echo $users['users_tingcode'];  ?>">

                                        <label class="form-label">TINGCODE</label>
                                    </div>
                            </div>

                            <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="users_username" required="required" value="<?php echo $users['users_username'];  ?>">

                                        <label class="form-label">USERSUSERNAME</label>
                                    </div>
                            </div>


                            <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="users_password" required="required" value="<?php echo $users['users_password'];  ?>">

                                        <label class="form-label">PASSWORD</label>
                                    </div>
                            </div>


                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="level_id" id="level_id" required="required" class="form-control show-tick">
                                        <option value="">-- PILIH LEVEL --</option>
                                            <?php
                                            foreach($level_view as $row)
                                            {
                                              $selected = "";
                                              if($row->level_id == $users['level_id'])
                                                $selected = 'selected="selected"';

                                              echo "<option value='".$row->level_id."' $selected>" .$row->level_nama.'</option>';
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>

                              <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="users_photo" required="required" value="<?php echo $users['users_photo'];  ?>">

                                        <label class="form-label">POTO</label>
                                    </div>
                            </div>

                            <label>Aktif</label>
                            <div class="demo-radio-button">

                                    <?php if ($users['users_aktif'] == "Y") { ?>
                                        <input name="users_aktif" type="radio" id="radio_1" value="Y" checked />
                                        <label for="radio_1">Aktif</label>
                                        <input name="users_aktif" type="radio" id="radio_2" value="T" />
                                        <label for="radio_2">Tidak</label>
                                    
                                    <?php } else { ?>
                                    
                                        <input name="users_aktif" type="radio" id="radio_1" value="Y"  />
                                        <label for="radio_1">Aktif</label>
                                        <input name="users_aktif" type="radio" id="radio_2" value="T" checked/>
                                        <label for="radio_2">Tidak</label>
                                    <?php } ?>     
                            </div>

                           
                                <button class="btn btn-primary waves-effect" type="submit">Update</button>

                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
   



