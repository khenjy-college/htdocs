package com.example.temu9.Adapter;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.temu9.API.APIRequestData;
import com.example.temu9.API.RetroServer;
import com.example.temu9.Activity.MainActivity;
import com.example.temu9.Activity.UbahActivity;
import com.example.temu9.Model.DataModel;
import com.example.temu9.R;
import com.example.temu9.Model.ResponseModel;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class AdapterData extends RecyclerView.Adapter<AdapterData.HolderData> {
    private Context ctx;
    private List<DataModel> listData;
    private UbahActivity ubahActivity;

    public AdapterData(Context ctx, List<DataModel> listData) {
        this.ctx = ctx;
        this.listData = listData;
        this.ubahActivity = ubahActivity;
    }

    @NonNull
    @Override
    public HolderData onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View layout = LayoutInflater.from(parent.getContext()).inflate(R.layout.card_item, parent, false);
        return new HolderData(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull HolderData holder, int position) {
        DataModel dm = listData.get(position);
        holder.tvId.setText(String.valueOf(dm.getId()));
        holder.tvNama.setText(dm.getNama());
        holder.tvAlamat.setText(dm.getAlamat());
        holder.tvTelepon.setText(dm.getTelepon());
    }

    @Override
    public int getItemCount() {
        return listData.size();
    }

    public class HolderData extends RecyclerView.ViewHolder {
        TextView tvId, tvNama, tvAlamat, tvTelepon;

        public HolderData(@NonNull View itemView) {
            super(itemView);
            tvId = itemView.findViewById(R.id.tv_id);
            tvNama = itemView.findViewById(R.id.tv_nama);
            tvAlamat = itemView.findViewById(R.id.tv_alamat);
            tvTelepon = itemView.findViewById(R.id.tv_telepon);

            itemView.setOnLongClickListener(new View.OnLongClickListener() {
                @Override
                public boolean onLongClick(View view) {
                    AlertDialog.Builder dialogPesan = new AlertDialog.Builder(ctx);
                    dialogPesan.setMessage("Pilih Operasi yang Akan Dilakukan");
                    dialogPesan.setCancelable(true);

                    int idLaundry = Integer.parseInt(tvId.getText().toString());

                    dialogPesan.setPositiveButton("Hapus", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialogInterface, int i) {
                            deleteData(idLaundry);
                            dialogInterface.dismiss();
                        }
                    });
                    dialogPesan.setNegativeButton("Ubah", new DialogInterface.OnClickListener() {
                        @Override
                        public void onClick(DialogInterface dialogInterface, int i) {
                            // You can implement update functionality here
                            dialogInterface.dismiss();
                        }
                    });
                    dialogPesan.show();
                    return false;
                }
            });
        }

        private void deleteData(int idLaundry) {
            APIRequestData ardData = RetroServer.konekRetrofit().create(APIRequestData.class);
            Call<ResponseModel> hapusData = ardData.ardDeleteData(idLaundry);
            hapusData.enqueue(new Callback<ResponseModel>() {
                @Override
                public void onResponse(Call<ResponseModel> call, Response<ResponseModel> response) {
                    if (response.isSuccessful() && response.body() != null) {
                        int kode = response.body().getKode();
                        String pesan = response.body().getPesan();
                        Toast.makeText(ctx, "Kode: " + kode + " | Pesan: " + pesan, Toast.LENGTH_SHORT).show();
                        ((MainActivity) ctx).retrieveData(); // Refresh data after deletion
                    }
                }

                @Override
                public void onFailure(Call<ResponseModel> call, Throwable t) {
                    Toast.makeText(ctx, "Gagal Menghubungi Server: " + t.getMessage(), Toast.LENGTH_SHORT).show();
                }
            });
        }
    }
}
