<div>
    <div>
        <?php
            require 'conexion.php';
            $idfam=$_GET['idfam'];
            $sql='select * from vista3 where idfamilia=:idfam;';
            $ps=$cn->prepare($sql);
            $ps->bindParam(":idfam", $idfam);
            $ps->execute();
            $filas=$ps->fetchall();    
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>IdFamilia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($filas as $f){
                ?>
                <tr>
                    <td><?=$f[0]?></td>
                    <td><?=$f[1]?></td>
                    <td><?=$f[2]?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>