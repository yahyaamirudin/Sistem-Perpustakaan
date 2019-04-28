<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Daftar Anggota Perpustakaan Kampus');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $i=0;
            $html='<h3>Daftar Anggota</h3>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                            <th width="5%" align="center">No</th>
                            <th width="18%" align="center">NIM</th>
                            <th width="20%" align="center">Nama</th>
                            <th width="15%" align="center">Tempat Lahir</th>
                            <th width="13%" align="center">Tanggal Lahir</th>
                            <th width="10%" align="center">Gender</th>
                            <th width="20%" align="center">Prodi</th>
                        </tr>';
            foreach ($anggota as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                            <td align="center">'.$i.'</td>
                            <td>'.$row['nim'].'</td>
                            <td>'.$row['nama'].'</td>
                            <td>'.$row['tempat_lahir'].'</td>
                            <td>'.$row['tgl_lahir'].'</td>
                            <td>'.$row['jk'].'</td>
                            <td>'.$row['prodi'].'</td>
                        </tr>';
                }
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('daftar_produk.pdf', 'I');
?>