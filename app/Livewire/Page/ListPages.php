<?php

namespace App\Livewire\Page;

use App\Models\LandingPage;
use App\Services\SalekitApiService;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Collection;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Filament\Tables\Actions\Action;

class ListPages extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public ?array $data = [];

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                ViewColumn::make('name')->label(__('Tên'))
                    ->view('tables.columns.landing-page-name-column')->searchable()->sortable()->toggleable(),
                ViewColumn::make('product')->label(__('Sản phẩm'))
                    ->view('tables.columns.landing-page-product-column')
                    ->tooltip(function (ViewColumn $column) {
                        return $column->getState();
                    })->searchable()->sortable()->toggleable(),
                TextColumn::make('created_at')->label(__('Thời gian tạo'))->dateTime('d/m/Y H:i')->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make('edit_name')
                    ->label('Sửa tên')
                    ->icon('heroicon-m-pencil-square')
                    ->color('warning')
                    ->form([
                        TextInput::make('name')
                            ->label(__('Tên'))
                            ->required(),
                    ])
                    ->using(function (LandingPage $record, array $data): LandingPage {
                        $record->update($data);
                        return $record;
                    }),
                EditAction::make('update_product')
                    ->label(__('Cập nhật sản phẩm'))
                    ->form([
                        TagsInput::make('product')
                            ->label(__('Sản phẩm'))
                            ->required(),
                    ])->color('info')
                    ->using(function (LandingPage $record, array $data): LandingPage {
                        $record->update($data);
                        return $record;
                    }),
            ])
            ->bulkActions([
                //
            ])
            ->defaultSort('created_at', 'desc');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('Tên'))
                    ->required(),
            ])
            ->statePath('data')
            ->model(LandingPage::class);
    }

    /**
     * @throws BindingResolutionException
     */
    public function create(): void
    {
        $data = $this->form->getState();
        LandingPage::create($data);
        to_route('page');
    }

    protected function getTableQuery(): Builder
    {
        return LandingPage::query();
    }

    public function render()
    {
        return view('livewire.page.list-pages');
    }
}
