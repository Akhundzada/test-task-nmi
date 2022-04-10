<?php

declare(strict_types=1);
namespace Importer\Domain\Processor\DTO;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

final class RawBatchRowDto
{
    public function __construct (
        private string $merchantId,
        private string $merchantName,
        private string $batchDate,
        private string $batchRefNum,
        private string $txDate,
        private string $txType,
        private string $txCardType,
        private string $txCardNum,
        private float $txAmount
    ) {
    }

    /**
     * @return string
     */
    public function getMerchantId(): string
    {
        return $this->merchantId;
    }

    /**
     * @param string $merchantId
     * @return RawBatchRowDto
     */
    public function setMerchantId(string $merchantId): RawBatchRowDto
    {
        $this->merchantId = $merchantId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMerchantName(): string
    {
        return $this->merchantName;
    }

    /**
     * @param string $merchantName
     * @return RawBatchRowDto
     */
    public function setMerchantName(string $merchantName): RawBatchRowDto
    {
        $this->merchantName = $merchantName;
        return $this;
    }

    /**
     * @return string
     */
    public function getBatchDate(): string
    {
        return $this->batchDate;
    }

    /**
     * @param string $batchDate
     * @return RawBatchRowDto
     */
    public function setBatchDate(string $batchDate): RawBatchRowDto
    {
        $this->batchDate = $batchDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getBatchRefNum(): string
    {
        return $this->batchRefNum;
    }

    /**
     * @param string $batchRefNum
     * @return RawBatchRowDto
     */
    public function setBatchRefNum(string $batchRefNum): RawBatchRowDto
    {
        $this->batchRefNum = $batchRefNum;
        return $this;
    }

    /**
     * @return string
     */
    public function getTxDate(): string
    {
        return $this->txDate;
    }

    /**
     * @param string $txDate
     * @return RawBatchRowDto
     */
    public function setTxDate(string $txDate): RawBatchRowDto
    {
        $this->txDate = $txDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getTxType(): string
    {
        return $this->txType;
    }

    /**
     * @param string $txType
     * @return RawBatchRowDto
     */
    public function setTxType(string $txType): RawBatchRowDto
    {
        $this->txType = $txType;
        return $this;
    }

    /**
     * @return string
     */
    public function getTxCardType(): string
    {
        return $this->txCardType;
    }

    /**
     * @param string $txCardType
     * @return RawBatchRowDto
     */
    public function setTxCardType(string $txCardType): RawBatchRowDto
    {
        $this->txCardType = $txCardType;
        return $this;
    }

    /**
     * @return float
     */
    public function getTxAmount(): float
    {
        return $this->txAmount;
    }

    /**
     * @param float $txAmount
     * @return RawBatchRowDto
     */
    public function setTxAmount(float $txAmount): RawBatchRowDto
    {
        $this->txAmount = $txAmount;
        return $this;
    }

    #[Pure] #[ArrayShape([
        'merchantId' => "string",
        'merchantName' => "string",
        'batchDate' => "string",
        'batchRefNum' => "string",
        'txDate' => "string",
        'txType' => "string",
        'txCardType' => "string",
        'txCardNum' => "string",
        'txAmount' => "float"
    ])]
    public function toArray(): array
    {
        return [
            'merchantId' => $this->getMerchantId(),
            'merchantName' => $this->getMerchantName(),
            'batchDate' => $this->getBatchDate(),
            'batchRefNum' => $this->getBatchRefNum(),
            'txDate' => $this->getTxDate(),
            'txType' => $this->getTxType(),
            'txCardType' => $this->getTxCardType(),
            'txCardNum' => $this->getTxCardNum(),
            'txAmount' => $this->getTxAmount()
        ];
    }

    /**
     * @return string
     */
    public function getTxCardNum(): string
    {
        return $this->txCardNum;
    }

    /**
     * @param string $txCardNum
     */
    public function setTxCardNum(string $txCardNum): void
    {
        $this->txCardNum = $txCardNum;
    }

}