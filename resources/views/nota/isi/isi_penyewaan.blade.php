

@foreach($transaksi->detailTransaksi as $index => $detail)
<div class="wcdiv" style="top:{{ ($loop->iteration * 11.49) }}pt;">
    <div class="wcdiv" style="clip:rect(0.5pt,32.9pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $index +1 }}</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt;">
        <div class="wcdiv" style="left:-10pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $detail->tipe->tipe ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; ">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; right:-95pt; top:0pt; line-height:10.99pt; text-align:center;">{{ $detail->unit_out ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt;">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; right:-100pt; top:0pt; line-height:10.99pt;">{{ $detail->tipe->satuan ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; right:-100pt; top:0pt; line-height:10.99pt;">{{ formatRupiah($detail->tipe->tarif_sewa) ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt;">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; right:-50pt; top:0pt; line-height:10.99pt;">{{ $detail->lama_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; ">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; right:-75pt; top:0pt; line-height:10.99pt;">{{  formatRupiah($detail->tarif_sewa) ?? ''}}</span></div>
    </div>
</div>
@endforeach
{{-- <div class="wcdiv" style="top:22.97pt;">
    <div class="wcdiv" style="clip:rect(0.5pt,32.9pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ isset($transaksi->detailTransaksi[1]->unit_out) ? 2 : '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0.5pt,106.15pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[1]->tipe->tipe ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0.5pt,34.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[1]->unit_out ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0.5pt,48.3pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[1]->tipe->satuan ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0.5pt,67.45pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[1]->tipe->tarif_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0.5pt,32.35pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[1]->lama_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0.5pt,68.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{  $transaksi->detailTransaksi[1]->tarif_sewa ?? ''}}</span></div>
    </div>
</div>
<div class="wcdiv" style="top:33.96pt;">
    <div class="wcdiv" style="clip:rect(0.5pt,32.9pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ isset($transaksi->detailTransaksi[2]->unit_out) ? 3 : '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0.5pt,106.15pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[2]->tipe->tipe ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0.5pt,34.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[2]->unit_out ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0.5pt,48.3pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[2]->tipe->satuan ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0.5pt,67.45pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[2]->tipe->tarif_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0.5pt,32.35pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[2]->lama_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0.5pt,68.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{  $transaksi->detailTransaksi[2]->tarif_sewa ?? ''}}</span></div>
    </div>
</div>
<div class="wcdiv" style="top:44.94pt;">
    <div class="wcdiv" style="clip:rect(0.5pt,32.9pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ isset($transaksi->detailTransaksi[3]->unit_out) ? 4 : '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0.5pt,106.15pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[3]->tipe->tipe ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0.5pt,34.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[3]->unit_out ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0.5pt,48.3pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[3]->tipe->satuan ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0.5pt,67.45pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[3]->tipe->tarif_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0.5pt,32.35pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[3]->lama_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0.5pt,68.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{  $transaksi->detailTransaksi[3]->tarif_sewa ?? ''}}</span></div>
    </div>
</div>
<div class="wcdiv" style="top:55.93pt;">
    <div class="wcdiv" style="clip:rect(0.5pt,32.9pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ isset($transaksi->detailTransaksi[4]->unit_out) ? 5 : '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0.5pt,106.15pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[4]->tipe->tipe ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0.5pt,34.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[4]->unit_out ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0.5pt,48.3pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[4]->tipe->satuan ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0.5pt,67.45pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[4]->tipe->tarif_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0.5pt,32.35pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[4]->lama_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0.5pt,68.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{  $transaksi->detailTransaksi[4]->tarif_sewa ?? ''}}</span></div>
    </div>
</div>
<div class="wcdiv" style="top:66.92pt;">
    <div class="wcdiv" style="clip:rect(0.5pt,32.9pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ isset($transaksi->detailTransaksi[5]->unit_out) ? 6 : '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0.5pt,106.15pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[5]->tipe->tipe ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0.5pt,34.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[5]->unit_out ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0.5pt,48.3pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[5]->tipe->satuan ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0.5pt,67.45pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[5]->tipe->tarif_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0.5pt,32.35pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[5]->lama_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0.5pt,68.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{  $transaksi->detailTransaksi[5]->tarif_sewa ?? ''}}</span></div>
    </div>
</div>
<div class="wcdiv" style="top:77.9pt;">
    <div class="wcdiv" style="clip:rect(0.5pt,32.9pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ isset($transaksi->detailTransaksi[6]->unit_out) ? 7 : '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0.5pt,106.15pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[6]->tipe->tipe ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0.5pt,34.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[6]->unit_out ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0.5pt,48.3pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[6]->tipe->satuan ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0.5pt,67.45pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[6]->tipe->tarif_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0.5pt,32.35pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[6]->lama_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0.5pt,68.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{  $transaksi->detailTransaksi[6]->tarif_sewa ?? ''}}</span></div>
    </div>
</div>
<div class="wcdiv" style="top:88.89pt;">
    <div class="wcdiv" style="clip:rect(0.5pt,32.9pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ isset($transaksi->detailTransaksi[7]->unit_out) ? 8 : '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0.5pt,106.15pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[7]->tipe->tipe ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0.5pt,34.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[7]->unit_out ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0.5pt,48.3pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[7]->tipe->satuan ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0.5pt,67.45pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[7]->tipe->tarif_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0.5pt,32.35pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[7]->lama_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0.5pt,68.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{  $transaksi->detailTransaksi[7]->tarif_sewa ?? ''}}</span></div>
    </div>
</div>
<div class="wcdiv" style="top:99.87pt;">
    <div class="wcdiv" style="clip:rect(0.5pt,32.9pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ isset($transaksi->detailTransaksi[8]->unit_out) ? 9 : '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0.5pt,106.15pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[8]->tipe->tipe ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0.5pt,34.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[8]->unit_out ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0.5pt,48.3pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[8]->tipe->satuan ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0.5pt,67.45pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[8]->tipe->tarif_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0.5pt,32.35pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{ $transaksi->detailTransaksi[8]->lama_sewa ?? '' }}</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0.5pt,68.75pt,12.49pt,0pt);">
        <div class="wcdiv" style="left:5.4pt; top:0.5pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">{{  $transaksi->detailTransaksi[8]->tarif_sewa ?? ''}}</span></div>
    </div>
</div> --}}
{{-- <div class="wcdiv" style="top:110.86pt;">
    <div class="wcdiv" style="clip:rect(0pt,32.9pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0pt,106.15pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0pt,34.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0pt,48.3pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0pt,67.45pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0pt,32.35pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0pt,68.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
</div>
<div class="wcdiv" style="top:121.85pt;">
    <div class="wcdiv" style="clip:rect(0pt,32.9pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0pt,106.15pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0pt,34.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0pt,48.3pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0pt,67.45pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0pt,32.35pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0pt,68.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
</div>
<div class="wcdiv" style="top:132.83pt;">
    <div class="wcdiv" style="clip:rect(0pt,32.9pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0pt,106.15pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0pt,34.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0pt,48.3pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0pt,67.45pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0pt,32.35pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0pt,68.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
</div>
<div class="wcdiv" style="top:143.82pt;">
    <div class="wcdiv" style="clip:rect(0pt,32.9pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0pt,106.15pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0pt,34.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0pt,48.3pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0pt,67.45pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0pt,32.35pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0pt,68.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
</div>
<div class="wcdiv" style="top:154.8pt;">
    <div class="wcdiv" style="clip:rect(0pt,32.9pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0pt,106.15pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0pt,34.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0pt,48.3pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0pt,67.45pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0pt,32.35pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0pt,68.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
</div>
<div class="wcdiv" style="top:165.79pt;">
    <div class="wcdiv" style="clip:rect(0pt,32.9pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0pt,106.15pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0pt,34.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0pt,48.3pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0pt,67.45pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0pt,32.35pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0pt,68.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
</div>
<div class="wcdiv" style="top:176.78pt;">
    <div class="wcdiv" style="clip:rect(0pt,32.9pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:32.9pt; clip:rect(0pt,106.15pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:139.05pt; clip:rect(0pt,34.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:173.8pt; clip:rect(0pt,48.3pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:222.1pt; clip:rect(0pt,67.45pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:289.55pt; clip:rect(0pt,32.35pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
    <div class="wcdiv" style="left:321.9pt; clip:rect(0pt,68.75pt,11.99pt,0pt);">
        <div class="wcdiv" style="left:5.4pt;"><span class="wcspan wctext001" style="font-size:9pt; left:0pt; top:0pt; line-height:10.99pt;">Item1</span></div>
    </div>
</div> --}}
