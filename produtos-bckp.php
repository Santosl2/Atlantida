<?php 
                    if(Produtos::getAll()->rowCount() > 0):
                                
                        foreach(Produtos::getAll()->fetchAll(PDO::FETCH_ASSOC) as $key => $value):
                            $peso = isset($value['peso']) ? "- " .$value['peso'] : "";
                            //$classDiv = $key >= 1 && $key <= 2 ? "select_products_col_one" :  $key >= ;
                    ?>
                        
                            <div class="product">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row"> <?= $value['nome'];?> <?=$peso;?> </label>
                                    <input type="number" name="age" class="input w-full border mt-2" value="0" min="0"
                                        required></div>
                                <label class="flex flex-col sm:flex-row mt-1"> Preço: R$<?= $value['preco'];?></label>
                            </div>
                            
                                <?php endforeach; endif;?>